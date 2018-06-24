<link rel="stylesheet" href="style/vueEnsemble.css">

<!-- Nom de la page -->
<?php $nom_page = "Vue Ensemble"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>

<?php include 'controls/LoadRoom.php'?>

<div id=vueEnsemble>
	<div id=drawingctrl>
		<div>
			<form action="index.php?pageAction=v_vueensembleedition" method="post">
				<select name="HouseID" onchange='this.form.submit()'>
					<?php
					if (!isset($_SESSION["HouseID"])){
						echo "<option value='' disabled selected>Choisir la maison</option>";
					}
					$donnees= getAllHouses($db);
					foreach($donnees as $d){
						echo '<option value="'.$d['HouseID'].'"';
						if (isset($_SESSION["HouseID"]) && $_SESSION["HouseID"] == $d['HouseID']){
							echo " selected";					
						}
						echo '>'.$d['Name'].'</option>';
					}
					?>
				</select>
			</form>	
			<form action="index.php?pageAction=v_vueensembleedition" method="post">
				<select name="Floor" onchange='this.form.submit()'>
					<?php
					$f= (int) getSQL($db,"SELECT NumberOfFloor FROM houses WHERE HouseID=".$_SESSION['HouseID'])[0]["NumberOfFloor"];
					for($i=1;$i<$f+1;$i++){
						echo '<option value="'.$i.'"';
						if ($_SESSION["Floor"] == $i){
							echo " selected";					
						}
						echo '>'.$i.'</option>';
					}
					?>
				</select>
			</form>	
		</div>
		<div>
			<form id="SendBox" action="controls/SaveFloor.php" method="post">
				<input id="sav" type="hidden" name="Save" value="error">
				<input type="submit" value="Sauvegarder" onclick="saveToForm()">
			</form>
		</div>
		<div>
			<input type="button" value="Vue d'ensemble" onclick="location.href='index.php?pageAction=v_vueensemble';">
		</div>
	</div>
	<div id="drawingedition"></div>
	<div id="drawingHolder">
	
	</div>
</div>

<script>
	var Rooms = <?php echo json_encode($Rooms); ?>;
	var captors = <?php echo json_encode($captorArray); ?>;
	document.getElementById("drawingedition").style.zoom=2.0;
</script>

<script src="script/drawScript.js"></script>


<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>