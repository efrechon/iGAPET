<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/admin_stats.css"/>
    <link rel="icon" href="img/Logo.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
    <title>iGAPET</title>
</head>
<body>
<div id=header>
    <?php $nom_page="Administration";
    include('v_header.php');?>
</div>
<div id=nav>
    <?php include ('v_admin_menu.php');?>
</div>
<div id="full">
    <div class="demi">
        <h3>Statistiques utilisateur</h3>
        <?php $requetenbr=$db->query("SELECT COUNT(UserID) as nbr FROM users WHERE UserTypeID!=-2 OR USerTypeID=-1");
        $nbr=$requetenbr->fetch();
        echo 'Il y a '.$nbr['nbr']." utilisateurs d'inscrit sur le site.<br/><br/>";
        $requeteavg=$db->query("SELECT AVG(NbrConnexion) as avg FROM users WHERE UserTypeID!=-2 OR USerTypeID=-1");
        $avg=$requeteavg->fetch();
        echo 'Moyenne de connexion : '.number_format($avg['avg'],1).'<br/><br/>';
        $requetemin=$db->query("SELECT MIN(NbrConnexion) as min FROM users  WHERE UserTypeID!=-2 OR USerTypeID=-1");
        $min=$requetemin->fetch();
        echo 'Minimum de connexion : ' .$min['min'].'<br/><br/>';
        $requetemax=$db->query("SELECT MAX(NbrConnexion) as max FROM users WHERE UserTypeID!=-2 OR USerTypeID=-1");
        $max=$requetemax->fetch();
        echo 'Maximum de connexion : ' .$max['max'].'<br/><br/>';
        $requetedate=$db->query("SELECT MAX(CreationDate) as date FROM users WHERE UserTypeID!=-2 OR USerTypeID=-1");
        $date=$requetedate->fetch();
        echo 'Dernière inscription : '.$date['date'].'<br/><br/>';
        $requetemaison=$db->query("SELECT UserID FROM users WHERE UserTypeID!=-2 OR USerTypeID=-1");
        $compteur= 0;
        $tab= 0;
        while($maison=$requetemaison->fetch()){
            $idUser= $maison['UserID'];
            $requetemaison2=$db->query("SELECT COUNT(HouseID) as nbrMaison FROM houses WHERE UserID=$idUser");
            while($maison2= $requetemaison2->fetch()){
                $tab += $maison2['nbrMaison'];
                $compteur +=1;
            }
            $avgmaison = $tab/$compteur;
        }
        echo 'Nombre de maison moyen par utilisateur : '.number_format($avgmaison,1).'<br/><br/>';
        //echo 'Nombre de capteur moyen par utilisateur : <br/><br/>';
        ?>
    </div>
    <div class="demi">
        <h3>Statistiques capteur</h3>
        <div class="chart-container">
            <canvas id="myChart" width="40" height="40"></canvas>
            <?php
            $reqC=$db->query("SELECT CaptorTypeID, CaptorName FROM captortypes");
            while($donnesC=$reqC->fetch()){
                $capteurs[]= $donnesC['CaptorName'];
                $id=$donnesC['CaptorTypeID'];
                $reqC2=$db->query("SELECT COUNT(*) as nbr FROM captors WHERE CaptorTypeID=$id");
                while($donnesC2=$reqC2->fetch()){
                    $nombre[]= $donnesC2['nbr'];
                }
            }
            $reqA=$db->query("SELECT ActuatorTypeID, ActuatorName FROM actuatortypes");
            while($donnesA=$reqA->fetch()){
                $capteurs[]= $donnesA['ActuatorName'];
                $id=$donnesA['ActuatorTypeID'];
                $reqA2=$db->query("SELECT COUNT(*) as nbr FROM actuators WHERE ActuatorTypeID=$id");
                while($donnesA2=$reqA2->fetch()){
                    $nombre[]= $donnesA2['nbr'];
                }
            }
            ?>
            <script>
                var ctx = document.getElementById("myChart").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:["<?php echo implode('","',$capteurs); ?>"],
                        datasets: [{
                            label: 'Nombre de capteurs installés',
                            data: [<?php echo implode(',',$nombre);?>],
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }]
                        }
                    }
                });
            </script>
        </div>
    </div>
</div>
</body>
</html>
