<link rel="stylesheet" href="style/ajout.css"/>

<!-- Nom de la page -->
<?php $nom_page = "Mon Profil"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<?php
    $mail= 'alain@yahoo.fr';
    $requete=$db->query("SELECT * FROM users WHERE Mail=':mail'");
    $requete->bindValue(':mail', $mail);
    while($donnes=$requete->fetch()){
        echo $donnes['FirstName'].'<br/>';
        echo $donnes['LastName'].'<br/>';
        echo $donnes['Mail'].'<br/>';
        echo $donnes['Phone'].'<br/>';
    }
?>

<form action="index.php?pageAction=profil&" method="post">
    <label for="lastName">Prénom : </label>
    <input type="text" name="lastName"><br/><br/>
    <label for="firstName">Nom : </label>
    <input type="text" name="firstName"><br/><br/>
    <label for="emailP">Email : </label>
    <input type="text" name="emailP"><br/><br/>
    <label for="passwordP">Mot de passe : </label>
    <input type="password" name="passwordP"><br/><br/>
    <label for="phone">Nunéro de téléphone : </label>
    <input type="tel" name="phone"><br/><br/>
    <input type="submit" value="Modifier">
</form>
<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>