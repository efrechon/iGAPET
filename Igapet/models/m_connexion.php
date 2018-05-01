<?php

function verification_existence_mail($db){
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
    $password= md5($_POST['passwordC']);
    $requete= $db->query("SELECT UserPassword FROM users WHERE Mail=':mail'");
    $requete->bindParam(':mail', $mail);
    if($requete->execute()== $password){
        return 'OK';
    }
    else{
        return'KO';
    }
}

function recup_informations($db){
    $mail=$_POST['emailC'];
    $requete= $db->query("SELECT UserID, FirstName, LastName, UserTypeID FROM users WHERE Mail=':mail'");
    $requete->bindParam(':mail',$mail);
    $requete->fetch();
    while($donnees = $requete->fetch()){
        $_SESSION['id']=$donnees['UserID'];
        $_SESSION['nom']=$donnees['FirstName'];
        $_SESSION['prenom']=$donnees['LastName'];
        $_SESSION['user_type']=$donnees['UserTypeID'];
    }
    $requete->closeCursor();
}

?>