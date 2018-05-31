<?php

function inscription_type_capteurs($db){
    $name= htmlspecialchars($_POST['CaptorName']);
    $unite= htmlspecialchars($_POST['Unit']);

    $requete= $db->prepare("INSERT INTO captortypes(CaptorName, Unit) VALUES (:name,:unite)");

    $requete->bindParam(':name', $name);
    $requete->bindParam(':unite', $unite);

    $requete->execute();
}

function inscription_type_actionneurs($db){
    $name= htmlspecialchars($_POST['ActuatorName']);
    $unite= htmlspecialchars($_POST['Unit']);
    $min=htmlspecialchars($_POST['MinimumValue']);
    $max=htmlspecialchars($_POST['MaximumValue']);


    $requete= $db->prepare("INSERT INTO actuatortypes(ActuatorName, Unit, MinimumValue, MaximumValue) VALUES (:name,:unite,:min,:max)");

    $requete->bindParam(':name', $name);
    $requete->bindParam(':unite', $unite);
    $requete->bindParam(':min', $min);
    $requete->bindParam(':max', $max);

    $requete->execute();
}

function envoi_message($db){
    $correspondant= htmlspecialchars($_SESSION['UserID']);
    $objet= htmlspecialchars($_POST['Objet']);
    $demande= htmlspecialchars($_POST['Demande']);
    $date= date('Y-m-d');

    $requete= $db->prepare("INSERT INTO messagerie(Correspondant, Objet, Demande, Date) VALUES (:correspondant,:objet,:demande,:date)");

    $requete->bindParam(':correspondant', $correspondant);
    $requete->bindParam(':demande', $demande);
    $requete->bindParam(':objet', $objet);
    $requete->bindParam(':date', $date);

    $requete->execute();
}

function envoi_panne($db){
    $correspondant= htmlspecialchars($_SESSION['UserID']);
    $objet= htmlspecialchars('Rapport de panne');
    $capteur=htmlspecialchars($_POST['CaptorName']);
    $piece=htmlspecialchars($_POST['Name']);
    $probleme=htmlspecialchars($_POST['Problem']);
    $demande= 'Le capteur<b> '.$capteur.'</b> se trouvant dans la pièce <b>'.$piece.'</b>.<br/>Rencontre le problème suivant : <b>'.$probleme.'</b>.';
    $date= date('Y-m-d');

    $requete= $db->prepare("INSERT INTO messagerie(Correspondant, Objet, Demande, Date) VALUES (:correspondant,:objet,:demande,:date)");

    $requete->bindParam(':correspondant', $correspondant);
    $requete->bindParam(':objet', $objet);
    $requete->bindParam(':demande', $demande);
    $requete->bindParam(':date', $date);

    $requete->execute();
}
?>