<?php

function changement_profil($db){
    // Récupération des valeurs
    $UserID= htmlspecialchars($_SESSION['UserID']);
    $LastName= htmlspecialchars($_POST["LastName"]);
    $FirstName= htmlspecialchars($_POST["FirstName"]);
    $Mail= htmlspecialchars($_POST["Mail"]);
    $UserPassword = password_hash($_POST['UserPassword'], PASSWORD_BCRYPT);
    $Phone= htmlspecialchars($_POST['Phone']);

    // Préparation de la requete SQL
    $requete= $db->prepare("UPDATE users SET LastName=:LastName,FirstName=:FirstName,Mail=:Mail,UserPassword=:UserPassword,Phone=:Phone WHERE UserID=:UserID");

    // Affectation des valeurs
	$requete->bindValue(':UserID',$UserID);
    $requete->bindValue(':LastName',$LastName);
    $requete->bindValue(':FirstName',$FirstName);
    $requete->bindValue(':Mail',$Mail);
    $requete->bindValue(':UserPassword',$UserPassword);
    $requete->bindValue(':Phone',$Phone);

    // Execution de la requete
    $requete->execute();

    if(!isset($_SESSION['FirstName']) || $_POST['FirstName'] != $_SESSION['FirstName']){
        $_SESSION['FirstName']= $_POST['FirstName'];
    }
    if(!isset($_SESSION['LastName']) ||$_POST['LastName'] != $_SESSION['LastName']){
        $_SESSION['LastName']= $_POST['LastName'];
    }
    if(!isset($_SESSION['Mail']) || $_POST['Mail'] != $_SESSION['Mail']){
        $_SESSION['Mail']= $_POST['Mail'];
    }
    if(!isset($_SESSION['UserPassword']) || $_POST['UserPassword'] != $_SESSION['UserPassword']){
        $_SESSION['UserPassword']= $_POST['UserPassword'];
    }
    if(!isset($_SESSION['Phone']) || $_POST['Phone'] != $_SESSION['Phone']){
        $_SESSION['Phone']= $_POST['Phone'];
    }

}

function recuperation_donnees(){

}

?>