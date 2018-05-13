<link rel="stylesheet" href="style/sav.css">

<!-- Nom de la page -->
<?php $nom_page = "SAV"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<div id="billet">
    <?php date_default_timezone_set('Europe/Paris');
    echo 'Le '.date('d/m/Y').' à '.date('h:i:sa').',';?>
    <p>
        Le capteur <input type="text"> se trouvant dans la pièce <input type="text"> est defectueux.<br/>
        La source du disfonctionnement est <input type="text">.
    </p>
    <input type="submit" value="Envoyer">
</div>
<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>