<?php

function inscription_utilisateur(){
    $db= connexion_BDD();

    $id= NULL;
    $prenom= NULL;
    $nom= NULL;
    $email= $_POST["emailI"];
    $adhesion= date('Y-m-d');
    $password = $_POST['passwordI'];
    $type_uti= 2;
    $phone= NULL;

    $requete= $db->prepare('INSERT INTO users VALUES(:UserID,:prenom,:nom,:mail,:date_adhesion,:password,:type_uti,:phone)');
    $requete->bindParam(':UserID',$id);
    $requete->bindParam(':prenom',$prenom);
    $requete->bindParam(':nom',$nom);
    $requete->bindParam(':mail',$email);
    $requete->bindParam(':date_adhesion',$adhesion);
    $requete->bindParam(':password',$password);
    $requete->bindParam(':type_uti',$type_uti);
    $requete->bindParam(':phone',$phone);
    $requete->execute();
}

?>