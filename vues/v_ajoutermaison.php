<link rel="stylesheet" href="style/ajout.css">

<!-- Nom de la page -->
<?php $nom_page = "Gestion des maisons"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<h2>Ajouter une maison</h2>
<form action="controls/c_inscription.php" method="post">
    <label for="Name">Renommer votre maison : </label>
    <input type="text" name="Name"><br/><br/>
    <label for="Address">Voie : </label>
    <input type="text" name="Address"><br/><br/>
    <label for="PostalCode">Code Postal : </label>
    <input type="text" name="PostalCode"><br/><br/>
    <label for="Country">Pays : </label>
    <input type="text" name="Country"><br/><br/>
    <label for="NumberOfFloor">Nombre d'étage : </label>
    <input type="number" name="NumberOfFloor" min="0" step="1"><br/><br/>
	<input type="hidden" value="maison" name="type">
	<?php if (isset($_SESSION["erreurAjoutMaison"]))
	{
		echo $_SESSION["erreurAjoutMaison"];
		unset($_SESSION["erreurAjoutMaison"]);
	}
	?>
	</br>
    <input type="submit" value="Ajouter">
</form>
<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>