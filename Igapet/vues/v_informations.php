<link rel="stylesheet" href="style/informations.css">

<!-- Nom de la page -->
<?php $nom_page = "Informations"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<div id="catalogue">
    <fieldset>
        <legend>Catalogue</legend>
        <h5>Capteurs</h5>
        <br/>
        <h5>Actionneurs</h5>
    </fieldset>
</div>
<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>