<link rel="stylesheet" href="style/contacter.css">

<!-- Nom de la page -->
<?php $nom_page = "Nous contacter"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<p>Vous pouvez nous envoyer un mail à l'adresse suivante : <b>app.igapet@gmail.com</b>, ou remplir les champs ci-contre :</p>
<form action="controls/c_admin.php" method="post">
    <p class="slogan">Comment pouvons nous vous aider ?</p><br/>
    <label for="Objet">Objet : </label><input type="text" name="Objet"><br/><br/>
    <textarea cols="175" rows="25" name="Demande"></textarea><br/>
    <input type="hidden" value="message" name="type">
    <input type="submit" value="Envoyer">
</form>

<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>