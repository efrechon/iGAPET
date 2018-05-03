<link rel="stylesheet" href="style/ajout.css"/>

<!-- Nom de la page -->
<?php $nom_page = "Mon Profil"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<form action="index.php?pageAction=profil&modifier=yes" method="post">
    <label for="lastName">Prénom : </label>
    <input type="text" name="firstName" value= <?php echo $_SESSION['prenom']?>><br/><br/>
    <label for="firstName">Nom : </label>
    <input type="text" name="lastName" value= <?php echo $_SESSION['nom']?>><br/><br/>
    <label for="emailP">Email : </label>
    <input type="text" name="emailP" value= <?php echo $_SESSION['mail']?>><br/><br/>
    <label for="passwordP">Mot de passe : </label>
    <input type="password" name="passwordP" value= <?php echo $_SESSION['passwordInit']?>><br/><br/>
    <label for="phone">Nunéro de téléphone : </label>
    <input type="text" name="phone" value= <?php echo $_SESSION['tel']?>><br/><br/>
    <input type="submit" value="Modifier">
</form>
<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>