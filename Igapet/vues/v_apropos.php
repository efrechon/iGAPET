<!-- Nom de la page -->
<?php $nom_page = "A propos"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>

<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>