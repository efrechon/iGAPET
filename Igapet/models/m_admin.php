<?php

function inscription_type_capteurs($db){
    $name= htmlspecialchars($_POST['nameNT']);
    $unite= htmlspecialchars($_POST['uniteNT']);

    $requete= $db->prepare("INSERT INTO captortypes(CaptorName, Unit) VALUES (:name,:unite)");

    $requete->bindParam(':name', $name);
    $requete->bindParam(':unite', $unite);

    $requete->execute();
}

function inscription_type_actionneurs($db){
    $name= htmlspecialchars($_POST['nameNT']);
    $unite= htmlspecialchars($_POST['uniteNT']);
    $min=$_POST['OFFNUMBER'];
    $max=$_POST['ONNUMBER'];


    $requete= $db->prepare("INSERT INTO actuatortypes(ActuatorName, Unite, MinimumValue, MaximumValue) VALUES (:name,:unite)");

    $requete->bindParam(':name', $name);
    $requete->bindParam(':unite', $unite);

    $requete->execute();
}
?>