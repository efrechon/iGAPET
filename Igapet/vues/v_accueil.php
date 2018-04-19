<!-- Nom de la page -->
<?php $nom_page = "Accueil"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<p> Bonjour, Bienvenue chez iGAPET produit de DOMISEP</p>
<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>