<?php

function changement_profil($db){
    // Récupération des valeurs
    $id= htmlspecialchars($_SESSION['id']);
    $nom= htmlspecialchars($_POST["lastName"]);
    $prenom= htmlspecialchars($_POST["firstName"]);
    $email= htmlspecialchars($_POST["emailP"]);
    $password = password_hash($_POST['passwordP'], PASSWORD_BCRYPT);
    $phone= htmlspecialchars($_POST['phone']);

    // Préparation de la requete SQL
    $requete= $db->prepare("UPDATE users SET LastName=:nom,FirstName=:prenom,Mail=:mail,UserPassword=:password,Phone=:phone WHERE UserID=$id");

    // Affectation des valeurs
    $requete->bindValue(':nom',$nom);
    $requete->bindValue(':prenom',$prenom);
    $requete->bindValue(':mail',$email);
    $requete->bindValue(':password',$password);
    $requete->bindValue(':phone',$phone);

    // Execution de la requete
    $requete->execute();

    if($_POST['firstName'] != $_SESSION['prenom']){
        $_SESSION['prenom']= $_POST['firstName'];
    }
    if($_POST['lastName'] != $_SESSION['nom']){
        $_SESSION['nom']= $_POST['lastName'];
    }
    if($_POST['emailP'] != $_SESSION['mail']){
        $_SESSION['mail']= $_POST['emailP'];
    }
    if($_POST['passwordP'] != $_SESSION['passwordInit']){
        $_SESSION['passwordInit']= $_POST['passwordP'];
    }
    if($_POST['phone'] != $_SESSION['tel']){
        $_SESSION['tel']= $_POST['phone'];
    }

}

function recuperation_donnees(){

}

?>