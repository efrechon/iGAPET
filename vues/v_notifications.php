<link rel="stylesheet" href="style/notification.css">

<!-- Nom de la page -->
<?php $nom_page = "Notifications"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<div id="notifications">
	<div class="moyenne" >
		<div class="ajout">
	
        <form action="controls/c_inscription.php" method="post" id="form">
				<h4>Ajouter une notification</h4>
				<input type="checkbox" name="partout" id="CC">
				<label for="partout"> partout </label>
				<br></br>
				<select id="HouseSelect">
					<option value='' disabled selected>Choisir une maison </option>
					<?php
					$donnees= getSQL($db,"SELECT Name, HouseID FROM houses WHERE UserID=".$_SESSION['UserID']);
					foreach($donnees as $d){
						echo '<option value=H'.$d['HouseID'].'>'.$d['Name'].'</option></br>';
					}
					?>
				</select>
				<button type="button" onclick='AddHouse()'> + </button>
				<br/><br/>
			<div id="Autorisation">
					maisons
					<div id="autorisationHouse">
					</div>
			</div>
			<br>
				
				<select id="CaptorSelect">
					<option value='' disabled selected> type de capteur </option>
					<?php
					$donnees= getSQL($db,"SELECT CaptorTypeId,CaptorName FROM captortypes");
					foreach($donnees as $d){
						echo '<option value=C'.$d['CaptorTypeId'].'>'.$d['CaptorName'].'</option></br>';
					}
					
					?>
				</select>
				<br/><br/>	
				<label for="declenchement">consigne de déclenchement</label>
				<input type="text" name="declenchement" id="N"><br><br>
				<input type="checkbox" name="toujour" id="CC">
				<label for="toujour"> tout les jours </label>
				<br>
				entre
				<input type="date" name="date" id="N">
				et
				<input type="date" name="date" id="N">
				<br><br>
				
				<input type="checkbox" name="toujour" id="CC">
				<label for="toujour"> toutes les heures </label>
				<br>
				entre
				<input type="time" name="time" id="N">
				et
				<input type="time" name="time" id="N">
				
				<br><br><br>
				<input type="submit" value="Ajouter" id="sender">
				<input type="hidden" id="autorisationListHouse" value="" name="CustomAutorisationsHouse">
				
			</form>
        </div>
<div class="ajout">
	
        <form action="controls/c_inscription.php" method="post" id="form">
				<h4>notifications</h4>
				
        </div>
	
     </div>
</div>

<script>

	<?php 
	if (isset($_POST['LoadFormUserID']) && !empty($_POST['LoadFormUserID'])){
		$UserTypeID = getSQL($db,"SELECT Mail,UserTypeID,UserID FROM users WHERE UserID=".$_POST['LoadFormUserID'])[0];
		$donnees = getSQL($db,"SELECT * FROM usertypes WHERE UserTypeID=".$UserTypeID['UserTypeID'])[0];
		$donnees['Name'] = $UserTypeID['Mail'];
		$donnees['UserID'] = $UserTypeID['UserID'];
		$a = explode("-",$donnees['CustomAutorisationsHouse']);
		if (count($a) != 1 || $a[0] != "")
		{
		foreach($a as $b){
			$b = ltrim($b,"H");
			$donnees["H".$b] = getSQL($db,"SELECT Name FROM houses WHERE HouseID=".$b)[0]['Name'];
		}
		}
		
		$a = explode("-",$donnees['CustomAutorisationsCaptor']);
		$ac = getSQL($db,"SELECT ActuatorName,ActuatorTypeID FROM actuatortypes");
		$ca = getSQL($db,"SELECT CaptorName,CaptorTypeID FROM captortypes");
		foreach($a as $b){
			foreach($ac as $r){
				if ("A".$r['ActuatorTypeID'] == $b)
				{
					$donnees[$b] = $r['ActuatorName'];
					break;
				}
			}
			foreach($ca as $t){
				if ("C".$t['CaptorTypeID'] == $b)
				{
					$donnees[$b] = $t['CaptorName'];
					break;
				}
			}
		}
		
		
		echo ('var UserInformation = '.json_encode($donnees).';');
	}
	?>
</script>

<script src="script/notifications.js"></script>
<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>