<link rel="stylesheet" href="style/scenarios.css">

<!-- Nom de la page -->
<?php $nom_page = "Scénarios"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<div id="scenario">
    <div class="ajout">
        <h3>Ajouter un scnéario</h3>
    </div>
    <div class="calendrier">
        <h3>Calendrier</h3>
    </div>
</div>
<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>