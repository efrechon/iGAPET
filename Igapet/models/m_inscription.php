<?php

function inscription_utilisateur($db){
    // Récupération des valeurs
    $email= $_POST["emailI"];
    $adhesion= date('Y-m-d');
    $password = md5($_POST['passwordI']);
    $type_uti= 2;

    // Préparation de la requete SQL
    $requete= $db->prepare('INSERT INTO users(Mail, CreationDate, UserPassword, UserTypeID) VALUES(:mail,:date_adhesion,:password,:type_uti)');

    // Affectation des valeurs
    $requete->bindParam(':mail',$email);
    $requete->bindParam(':date_adhesion',$adhesion);
    $requete->bindParam(':password',$password);
    $requete->bindParam(':type_uti',$type_uti);

    // Execution de la requete
    $requete->execute();
    $requete->closeCursor();
}

function verification_existence_mail($db){
    $mailexist= 'OK';
    $email= $_POST['emailI'];
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

function inscritption_maison($db){
    $nom=$_POST['name'];
    $voie=$_POST['adresseV'];
    $cp=$_POST['adresseCDP'];
    $pays=$_POST['adresseP'];
    $nbretage=$_POST['etages'];

    $requete=$db->query('INSERT INTO houses VALUES (:nom, :voie, :cp, :pays, :nbretage)');

    $requete->bindParam(':nom',$nom);
    $requete->bindParam(':voie',$voie);
    $requete->bindParam(':cp',$cp);
    $requete->bindParam(':pays',$pays);
    $requete->bindParam(':nbretage',$nbretage);

    $requete->execute();

}

?>