<link rel="stylesheet" href="style/sav.css">

<!-- Nom de la page -->
<?php $nom_page = "SAV"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<div id="billet">
    <?php date_default_timezone_set('Europe/Paris');
    echo 'Le '.date('d/m/Y').' à '.date('h:i:sa').',';?>
    <form method="post" action="controls/c_admin.php">
        <h3>Rapport de panne</h3><br/>
        <p>Le capteur <input type="text" name="CaptorName"> se trouvant dans la pièce <input type="text" name="Name"> est defectueux.<br/><br/>
        La source du disfonctionnement est <input type="text" name="Problem">.</p><br/>
        <input type="hidden" name="type" value="sav">
        <input type="submit" value="Envoyer">
    </form>
</div>
<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>