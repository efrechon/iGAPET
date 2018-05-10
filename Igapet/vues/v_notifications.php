<link rel="stylesheet" href="style/notifications.css">

<!-- Nom de la page -->
<?php $nom_page = "Notifications"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<div id="notifications">
    <div class="ajout">
        <h3>Ajouter une notification</h3>
    </div>
    <div class="recap">
        <h3>Résumé</h3>
    </div>
</div>
<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>