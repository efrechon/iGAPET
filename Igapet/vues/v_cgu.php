<link rel="stylesheet" href="style/reglementation.css">

<!-- Nom de la page -->
<?php $nom_page = "CGU"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<div class="tour">
    <?php
    $requete= $db->query("SELECT PageContent FROM page WHERE PageName='$nom_page'");
    while($donnees= $requete->fetch()){
        echo $donnees['PageContent'];
    }
    ?>
</div>
<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>