<link rel="stylesheet" href="style/ajout.css">
<!-- Nom de la page -->
<?php $nom_page = "Gestion des maisons"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<h2>Ajouter une pièce</h2>
<form action="" method="post">
    <label for="localisationM">Appartient à : </label>
    <select name="localisationM">
    <?php 
    $donneesList= getSQL($db,"SELECT Name, HouseID FROM houses WHERE UserID=".$_SESSION['id']);
    foreach($donneesList as $donnees){
        $nomM= $donnees['Name'];
        $idhome= $donnees['HouseID'];
        echo ('<option value='."$idhome".'>'.$nomM.'</option>');
    }
    ?>
    </select><br/><br/>
    <label for="nameP">Renommer votre pièce : </label>
    <input type="text" name="nameP"><br/><br/>
    <label for="largeur">Largeur : </label>
    <input type="number" name="largeur" min="0"><br/><br/>
    <label for="longueur">Longueur : </label>
    <input type="number" name="longueur" min="0"><br/><br/>
    <label for="positionX">Position en X : </label>
    <input type="number" name="positionX" min="0"><br/><br/>
    <label for="positionY">Position en Y : </label>
    <input type="number" name="positionY" min="0"><br/><br/>
    <label for="etage">Etage : </label>
    <input type="number" name="etage" min="0"><br/><br/>
    <input type="submit" value="Ajouter">
</form>
<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>