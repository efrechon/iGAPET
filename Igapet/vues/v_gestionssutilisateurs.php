<link rel="stylesheet" href="style/gestionssutilisateur.css">

<!-- Nom de la page -->
<?php $nom_page = "Gérer les utilisateurs"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<div id="geressutilisateur">
    <div class="modification">
        <div class="ajout">
			<form action="controls/c_reload.php" method="post">
				<select name="HouseID" onchange='this.form.submit()'>
					<option value='' disabled selected>Choisir une maison spécifique</option>
					<?php
					$donnees= getAllHouses($db);
					foreach($donnees as $d){
						echo '<option value='.$d['HouseID'].'>'.$d['Name'].'</option></br>';
					}
					?>
				</select>
				<input type="hidden" value="v_gestionssutilisateurs" name="link">
			</form>
			<form action="controls/c_inscription.php" method="post">
				<h4>Paramètres du compte sous utilisateur</h4>
			    <label for="Name">Nom du sous-compte : </label>
				<input type="text" name="Name"><br/><br/>
			    <label for="UserPassword">Mot de passe: </label>
				<input type="password" name="UserPassword"><br/><br/>	
				<label for="UserPassword2">Confirmer le mot de passe: </label>
				<input type="password" name="UserPassword2"><br/><br/>	
				<input type="checkbox" name="ConsulterToutesMaisons">
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
				<input type="checkbox" name="ConsulterTousCapteurs">
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
				<input type="checkbox" name="AddScenarios">
				<label for="AddScenarios">Planifier des scénarios </label><br/><br/>	
				<input type="checkbox" name="AddNotifications">
				<label for="AddNotifications">Ajouter des notifications </label><br/><br/>	
				<input type="checkbox" name="ConsultNotifications">
				<label for="ConsultNotifications">Consulter les notifications </label><br/><br/>	
				<input type="checkbox" name="ManageUsers">
				<label for="ManageUsers">Gérer les sous utilisateurs </label><br/><br/>	
				<input type="checkbox" name="ManageHouses">
				<label for="ManageHouses">Gérer les maisons </label><br/><br/>	
				<input type="hidden" id="autorisationListHouse" value="" name="CustomAutorisationsHouse">
				<input type="hidden" id="autorisationListCaptor" value="" name="CustomAutorisationsCaptor">
				<input type="hidden" name="type" value="sousutilisateur">
				<input type="submit" value="Ajouter">
			</form>
        </div>
        <div id="autorisation">
            <h4>Autorisations</h4>
        </div>
    </div>
    <div class="resume">
        <h4>Liste sous utilisateur</h4>
    </div>
</div>

<script src="script/s_gestionssutilisateurs.js"></script>

<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>