<link rel="stylesheet" href="style/accueil.css">

<!-- Nom de la page -->
<?php $nom_page = "Accueil"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<div id="full">
    <div id="Informations">
        <?php echo 'Bonjour '.$_SESSION['prenom'];?>
    </div>
    <div id="other">
        <p>Autres</p>
    </div>
    <div id="Notifications">
        <fieldset>
            <legend>Notifications</legend>
        </fieldset>
    </div>
</div>


<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>