<!-- Nom de la page -->
<?php $titre = "Mes actionneurs"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
    <p>Les actionneurs de notre maison sont jolis !</p>
<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>
