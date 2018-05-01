<?php

function exists($db){
    $mail=$_POST['emailC'];
    $password= md5($_POST['passwordC']);
    $requete= $db->query("SELECT UserPassword FROM users WHERE Mail=':mail'");
    $requete->bindValue(':mail', $mail);
    if($requete->execute()== $password){
        return 'OK';
    }
    else{
        return'KO';
    }
}

?>