<link rel="stylesheet" href="style/vueEnsemble.css">

<!-- Nom de la page -->
<?php $nom_page = "Vue Ensemble"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>

<?php include 'controls/LoadRoom.php'?>

<div id=vueEnsemble>
	<div id=drawingctrl>
		<div>
			<form action="index.php?pageAction=v_vueensemble" method="post">
				<select name="HouseID" onchange='this.form.submit()'>
					<?php
					if (!isset($_SESSION["HouseID"])){
						echo "<option value='' disabled selected>Choisir la maison</option>";
					}
					$donnees= getSQL($db,"SELECT Name, HouseID FROM houses WHERE UserID=".$_SESSION['UserID']);
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
			<form action="index.php?pageAction=v_vueensemble" method="post">
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
			<input type="button" value="Edition" onclick="location.href='index.php?pageAction=v_vueensembleedition';">
		</div>
	</div>
	
	<div id="drawing"></div>
	<!--
			<div class="RoomModif" name="nom" style="position:relative;left:0px;top:0px;Width:400px;Height:400px;">
			<div class="RoomBody">
				<div class="RoomName">Salon</div>
				<div class="captorContainer" style="clear:left;float:left;width:48%;height:50%;">
					<div class="LuminosityCaptor" name="switch">
						<img src="img/light_icon.png" alt="light">
					</div>
					
				</div>
				<div class="captorContainer" style="width:48%;height:20%;">
					<div class="temperatureCaptor">
						<p> Température </p>
						<p> 21.4 C </p>
					</div>
				</div>
				<div class="captorContainer" style="width:48%;height:20%;">
					<div class="temperatureCaptor">
					
					</div>
				</div>
				<div class="captorContainer" style="clear:left;float:left;width:48%;height:20%;">
					<div class="ShutterActuator" >
						<div class="shutterBlock">▲</div>
						<div class="shutterBlock">
							<img src="img/blinds.png" alt="light">
						</div>
						<div class="shutterBlock">▼</div>
					</div>
				</div>
			</div>
			-->
		</div>
		
</div>

<script>
	var Rooms = <?php echo json_encode($Rooms); ?>;
	var captors = <?php echo json_encode($captorArray); ?>;
</script>

<script src="script/drawScript2.js"></script>


<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>