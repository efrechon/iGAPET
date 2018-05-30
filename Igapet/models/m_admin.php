<?php

function inscription_type_capteurs($db){
    $name= htmlspecialchars($_POST['nameNTC']);
    $unite= htmlspecialchars($_POST['uniteNTC']);

    $requete= $db->prepare("INSERT INTO captortypes(CaptorName, Unit) VALUES (:name,:unite)");

    $requete->bindParam(':name', $name);
    $requete->bindParam(':unite', $unite);

    $requete->execute();
}

function inscription_type_actionneurs($db){
    $name= htmlspecialchars($_POST['nameNTA']);
    $unite= htmlspecialchars($_POST['uniteNTA']);
    $min=htmlspecialchars($_POST['minNTA']);
    $max=htmlspecialchars($_POST['maxNTA']);


    $requete= $db->prepare("INSERT INTO actuatortypes(ActuatorName, Unit, MinimumValue, MaximumValue) VALUES (:name,:unite,:min,:max)");

    $requete->bindParam(':name', $name);
    $requete->bindParam(':unite', $unite);
    $requete->bindParam(':min', $min);
    $requete->bindParam(':max', $max);

    $requete->execute();
}
?>