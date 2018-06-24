<?php

function changement_profil($db){
    // Récupération des valeurs
    $UserID= htmlspecialchars($_SESSION['UserID']);
    $LastName= htmlspecialchars($_POST["LastName"]);
    $FirstName= htmlspecialchars($_POST["FirstName"]);
    $Phone= htmlspecialchars($_POST['Phone']);

    // Préparation de la requete SQL
    $requete= $db->prepare("UPDATE users SET LastName=:LastName,FirstName=:FirstName,Phone=:Phone WHERE UserID=:UserID");

    // Affectation des valeurs
	$requete->bindValue(':UserID',$UserID);
    $requete->bindValue(':LastName',$LastName);
    $requete->bindValue(':FirstName',$FirstName);
    $requete->bindValue(':Phone',$Phone);

    // Execution de la requete
    $requete->execute();

    if(!isset($_SESSION['FirstName']) || $_POST['FirstName'] != $_SESSION['FirstName']){
        $_SESSION['FirstName']= $_POST['FirstName'];
    }
    if(!isset($_SESSION['LastName']) ||$_POST['LastName'] != $_SESSION['LastName']){
        $_SESSION['LastName']= $_POST['LastName'];
    }
    if(!isset($_SESSION['Phone']) || $_POST['Phone'] != $_SESSION['Phone']){
        $_SESSION['Phone']= $_POST['Phone'];
    }

}
?>