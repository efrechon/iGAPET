<link rel="stylesheet" href="style/gestionssutilisateur.css">

<!-- Nom de la page -->
<?php $nom_page = "Gérer les utilisateurs"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<div id="geressutilisateur">
    <div class="modification">
        <div class="ajout">
			<form action="controls/c_inscription.php" method="post" id="form">
				<h4>Paramètres du compte sous utilisateur</h4>
			    <label for="Name">Nom du sous-compte : </label>
				<input type="text" name="Name" id="N"><br/><br/>
			    <label for="UserPassword" id="P0">Mot de passe: </label>
				<input type="password" name="UserPassword" id ="P1"><br/><br/>	
				<label for="UserPassword2" id="P3">Confirmer le mot de passe: </label>
				<input type="password" name="UserPassword2" id="P2"><br/><br/>	
				<input type="checkbox" name="ConsulterToutesMaisons" id="CM">
				<label for="ConsulterToutesMaisons">Consulter mes maisons </label><br/><br/>	
				<select id="HouseSelect">
					<option value='' disabled selected>Choisir une maison spécifique</option>
					<?php
					$donnees= getSQL($db,"SELECT Name, HouseID FROM houses WHERE UserID=".$_SESSION['UserID']);
					foreach($donnees as $d){
						echo '<option value=H'.$d['HouseID'].'>'.$d['Name'].'</option></br>';
					}
					?>
				</select>
				<button type="button" onclick='AddHouse()'> + </button>
				<br/><br/>	
				<input type="checkbox" name="ConsulterTousCapteurs" id="CC">
				<label for="ConsulterTousCapteurs">Consulter ou utiliser mes capteurs </label>
				<select id="CaptorSelect">
					<option value='' disabled selected>Choisir un type de capteur spécifique</option>
					<?php
					$donnees= getSQL($db,"SELECT CaptorTypeId,CaptorName FROM captortypes");
					foreach($donnees as $d){
						echo '<option value=C'.$d['CaptorTypeId'].'>'.$d['CaptorName'].'</option></br>';
					}
					$donnees= getSQL($db,"SELECT ActuatorTypeID,ActuatorName FROM actuatortypes");
					foreach($donnees as $d){
						echo '<option value=A'.$d['ActuatorTypeID'].'>'.$d['ActuatorName'].'</option></br>';
					}
					?>
				</select>
				<button type="button" onclick='AddCaptor()'> + </button>
				<br/><br/>	
				<input type="checkbox" name="AddScenarios" id="AS">
				<label for="AddScenarios">Planifier des scénarios </label><br/><br/>	
				<input type="checkbox" name="AddNotifications" id="AN">
				<label for="AddNotifications">Ajouter des notifications </label><br/><br/>	
				<input type="checkbox" name="ConsultNotifications" id="CN">
				<label for="ConsultNotifications">Consulter les notifications </label><br/><br/>	
				<input type="checkbox" name="ManageUsers" id="MU">
				<label for="ManageUsers">Gérer les sous utilisateurs </label><br/><br/>	
				<input type="checkbox" name="ManageHouses" id="MH">
				<label for="ManageHouses">Gérer les maisons </label><br/><br/>	
				<input type="hidden" id="autorisationListHouse" value="" name="CustomAutorisationsHouse">
				<input type="hidden" id="autorisationListCaptor" value="" name="CustomAutorisationsCaptor">
				<input type="hidden" name="type" value="sousutilisateur" id="SU">
				<input type="submit" value="Ajouter" id="sender">
			</form>
        </div>
        <div id="autorisation">
            <h4>Autorisations</h4>
        </div>
    </div>
    <div class="resume">
        <h4>Liste sous utilisateur</h4>
		<?php 
			$donnees = getSQL($db,"SELECT * FROM usertypes WHERE ParentUserID=".$_SESSION['UserID']);	
			foreach($donnees as $d)
			{
				$u = getSQL($db,"SELECT * FROM users WHERE UserTypeID=".$d['UserTypeID']);
				echo "<div class=userBlock UserID=".$u[0]['UserID'].">".$u[0]['Mail']."<div class=delete></div></div>";
			}
		?>
		<form action="controls/c_gestionsUtilisateurs.php" method="POST" id="delform">
			<input type="hidden" value="" name="UserID" id="delinput">
		</form>
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
		
		if (count($a) != 1 && $a[0] != "")
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

<script src="script/s_gestionssutilisateurs.js"></script>

<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>