<?php

function verifi_mail($db){
    $mailexist= 'OK';
    $email= $_POST['emailC'];
    $requete= $db->prepare('SELECT Mail FROM users ');
    $requete->bindParam(':mail',$email);
    $requete->execute();
    while($saved = $requete->fetch()){
        if ($saved['Mail']== $email){
            $mailexist= 'KO';
            break;
        }
    }
    return $mailexist;
}

function authentification($db){
    $mail=$_POST['emailC'];
    $password= $_POST['passwordC'];
    $requete= $db->query("SELECT UserID, FirstName, LastName, UserPassword, Phone, UserTypeID FROM users WHERE Mail='$mail'");
    while($donnees= $requete->fetch()){
        if(password_verify($password,$donnees['UserPassword'])){
            $_SESSION['connected']= true;
            $_SESSION['id']= $donnees['UserID'];
            $_SESSION['mail']= $_POST['emailC'];
            $_SESSION['passwordInit']= $_POST['passwordC'];
            $_SESSION['user_type']= $donnees['UserTypeID'];
            if($donnees['FirstName'] != NULL){
                $_SESSION['prenom']= $donnees['FirstName'];
            }
            if($donnees['LastName'] != NULL){
                $_SESSION['nom']= $donnees['LastName'];
            }
            if($donnees['Phone'] == NULL){
                $_SESSION['tel']= $donnees['Phone'];
            }
            return 'OK';
        }
        else{
            return'KO';
        }
    }
}

function recup_informations($db){
    $mail=$_POST['emailC'];
    $requete= $db->query("SELECT UserID, FirstName, LastName, UserTypeID FROM users WHERE Mail=':mail'");
    $requete->bindParam(':mail',$mail);
    while($donnees = $requete->fetch()){
        $_SESSION['id']=$donnees['UserID'];
        $_SESSION['nom']=$donnees['FirstName'];
        $_SESSION['mail']=$donnees['emailC'];
        $_SESSION['passwordInit']= $_POST['passwordC'];
        $_SESSION['prenom']=$donnees['LastName'];
        $_SESSION['user_type']=$donnees['UserTypeID'];
    }
}

?>