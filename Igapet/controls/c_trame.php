<?php

    include('c_config.php');
    // Récupérer les trames
    $ch = curl_init();
    curl_setopt(
        $ch,
        CURLOPT_URL,
        "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=007E");
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $data = curl_exec($ch);
    curl_close($ch);

    $data= substr($data,345720);
    // Mettre les données sous la forme d'un tableau
    $data_tab = str_split($data,33);
    echo "Data Trames :<br />";
    for($i=0, $size=count($data_tab); $i<1000; $i++){
        echo "Trame $i: $data_tab[$i]<br/>";
        // Décodage
        list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec)=sscanf($data_tab[$i],"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
        echo("$t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec<br/>");
        echo hexdec($v).'<br/>';

        /*$valeur= hexdec($v);
        $date= $year.'-'.$month.'-'.$day.' '.$hour.':'.$min.':'.$sec;

        $requete=$db->prepare("INSERT INTO trames(CaptorType, CaptorNumber, Value, TrameNumber, Date) VALUES (:CaptorType,:CaptorNumber, :Value, :TrameNumber, :Date)");

        $requete->bindParam('CaptorType', $c);
        $requete->bindParam('CaptorNumber', $n);
        $requete->bindParam('Value', $valeur);
        $requete->bindParam('TrameNumber', $a);
        $requete->bindParam('Date', $date);

        $requete->execute();*/


    }

?>
