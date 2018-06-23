<link rel="stylesheet" href="style/ajout.css">
<!-- Nom de la page -->
<?php $nom_page = "Gestion des maisons"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<h2>Ajouter une pièce</h2>
<form action="controls/c_inscription.php" method="post">
    <label for="HouseID">Appartient à : </label>
    <select name="HouseID" onchange="changeFloor(this)">
	<option value="" selected disabled>Choisissez une maison</option>
    <?php 
    $donnees= getSQL($db,"SELECT Name, HouseID,NumberOfFloor FROM houses WHERE UserID=".$_SESSION['UserID']);
	$Nof = array();
    foreach($donnees as $d){
        echo ('<option value='.$d['HouseID'].'>'.$d['Name'].'</option>');
		array_push($Nof,$d['NumberOfFloor']);
		
    }
    ?>
    </select><br/><br/>
    <label for="Name">Renommer votre pièce : </label>
    <input type="text" name="Name"><br/><br/>
    <label for="Width">Largeur : </label>
    <input type="number" name="Width" min="0"><br/><br/>
    <label for="Height">Longueur : </label>
    <input type="number" name="Height" min="0"><br/><br/>
    <label for="Floor">Etage : </label>
    <select id="FLoorSelector" name='Floor'>
	
	</select>
	<input type="hidden" value="piece" name="type">
	<?php if (isset($_SESSION["erreurAjoutPiece"]))
	{
		echo $_SESSION["erreurAjoutPiece"];
		unset($_SESSION["erreurAjoutPiece"]);
	}
	?>
	</br>
    <input type="submit" value="Ajouter">
</form>

<script>
	var array = <?php echo (Json_encode($Nof)) ?>;
</script>
<script src="script/s_piece.js"></script>


<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>