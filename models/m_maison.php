<?php

function recup_liste_maison($db){
    $UserID= $_SESSION['UserID'];
    $requete= $db->query("SELECT Name, HouseID FROM houses WHERE UserID=$UserID");
    $maisons=$requete->fetchAll();
    return $maisons;
}

function recup_liste_capteur($db){
    $req1= $db->query("SELECT * FROM captortypes");
    $result1= $req1-> fetchAll();
    return $result1;
}

function bilan_capteur($db, $idcapteur){
    $requete= $db->query("SELECT COUNT(State) FROM actuators WHERE ActuatorTypeID='$idcapteur'");
    $resume= $requete->fetchAll();
    return $resume;
}
?>