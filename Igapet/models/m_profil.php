<?php

function modifier_profil($db){
    // Récupération des valeurs
    $id= A ;
    $nom= $_POST["lastName"];
    $prenom= $_POST["firstName"];
    $email= $_POST["emailI"];
    $password = crypt($_POST['passwordI']);
    $phone= $_POST['tel'];

    // Préparation de la requete SQL
    $requete= $db->prepare('UPDATE users SET LastName= :nom, FirstName= :prenom, Mail= :mail, Phone= :phone WHERE UserID= :id');

    // Affectation des valeurs
    $requete->bindParam(':id',$id);
    $requete->bindParam(':nom',$nom);
    $requete->bindParam(':prenom',$prenom);
    $requete->bindParam(':mail',$email);
    $requete->bindParam(':password',$password);
    $requete->bindParam(':phone',$phone);

    // Execution de la requete
    $requete->execute();

}

function recuperation_donnees(){

}

?>