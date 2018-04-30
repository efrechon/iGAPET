<link rel="stylesheet" href="style/ajout.css">

<!-- Nom de la page -->
<?php $nom_page = "Gestion des maisons"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<h2>Ajouter un capteur</h2>
<form action="" method="post">
    <label for="typeCapteur">Type de capteur: </label>
    <input type="text" name="typeCapteur"><br/><br/>
    <label for="emplacement">Pièce : </label>
    <input type="text" name="emplacement"><br/><br/>
    <input type="submit" value="Ajouter">
</form>
<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>