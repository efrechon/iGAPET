<link rel="stylesheet" href="style/ajout.css">

<!-- Nom de la page -->
<?php $nom_page = "Gestion des maisons"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<h2>Ajouter une maison</h2>
<form action="" method="post">
    <label for="name">Renommer votre maison : </label>
    <input type="text" name="name"><br/><br/>
    <label for="adresseV">Voie : </label>
    <input type="text" name="adresseV"><br/><br/>
    <label for="adresseCDP">Code Postal : </label>
    <input type="text" name="adresseCDP"><br/><br/>
    <label for="adresseP">Pays : </label>
    <input type="text" name="adresseP"><br/><br/>
    <label for="etages">Nombre d'étage : </label>
    <input type="text" name="etages"><br/><br/>
    <input type="submit" value="Ajouter">
</form>
<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>