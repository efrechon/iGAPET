<link rel="stylesheet" href="style/contacter.css">

<!-- Nom de la page -->
<?php $nom_page = "Nous contacter"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<form action="" method="post">
    <p class="demande">Comment pouvons nous vous aider ?</p><br/><br/>
    <textarea cols="175" rows="25" name="description"></textarea><br/>
    <input type="submit" value="Envoyer">
</form>

<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>