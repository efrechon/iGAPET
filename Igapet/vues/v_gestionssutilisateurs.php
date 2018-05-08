<link rel="stylesheet" href="style/gestionssutilisateur.css">

<!-- Nom de la page -->
<?php $nom_page = "Gérer les utilisateurs"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<div id="geressutilisateur">
    <div class="modification">
        <div class="ajout">
            <h4>Ajouter un sous utilisateur</h4>
        </div>
        <div class="autorisation">
            <h4>Autorisations</h4>
        </div>
    </div>
    <div class="resume">
        <h4>Liste sous utilisateur</h4>
    </div>
</div>

<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>