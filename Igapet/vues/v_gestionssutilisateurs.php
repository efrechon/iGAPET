<link rel="stylesheet" href="style/gestionssutilisateur.css">

<!-- Nom de la page -->
<?php $nom_page = "Gérer les utilisateurs"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<div id="geressutilisateur">
    <div class="modification">
        <div class="ajout">
            <h4>Paramètres du compte sous utilisateur</h4>
			    <label for="Name">Nom du sous-compte : </label>
				<input type="text" name="Name"><br/><br/>
			    <label for="UserPassword">Mot de passe: </label>
				<input type="password" name="UserPassword"><br/><br/>	
				<label for="UserPassword2">Confirmer le mot de passe: </label>
				<input type="password" name="UserPassword2"><br/><br/>	
				<input type="checkbox" name="Name">
				<label for="Name">Consulter mes maisons </label><br/><br/>	
				<select onchange='this.form.submit()'>
					<option value='' disabled selected>Choisir une maison spécifique</option>
					<?php
					$donnees= getSQL($db,"SELECT Name, HouseID FROM houses WHERE UserID=".$_SESSION['UserID']);
					foreach($donnees as $d){
						echo '<option value='.$d['HouseID'].'>'.$d['Name'].'</option></br>';
					}
					?>
				</select>
				<button type="button"> + </button>
				<br/><br/>	
				<input type="checkbox" name="Name">
				<label for="Name">Consulter mes pièces </label><br/><br/>	
				<input type="checkbox" name="Name">
				<label for="Name">Consulter ou utiliser mes capteurs </label>
				<select onchange='this.form.submit()'>
					<option value='' disabled selected>Choisir une capteur spécifique</option>
					<?php
					$donnees= getSQL($db,"SELECT CaptorTypeId,CaptorName FROM captortypes");
					foreach($donnees as $d){
						echo '<option value='.$d['CaptorTypeId'].'>'.$d['CaptorName'].'</option></br>';
					}
					$donnees= getSQL($db,"SELECT ActuatorTypeID,ActuatorName FROM actuatortypes");
					foreach($donnees as $d){
						echo '<option value=0'.$d['ActuatorTypeID'].'>'.$d['ActuatorName'].'</option></br>';
					}
					?>
				</select>
				<button type="button"> + </button>
				<br/><br/>	
				<input type="checkbox" name="Name">
				<label for="Name">Planifier des scénarios </label><br/><br/>	
				<input type="checkbox" name="Name">
				<label for="Name">Ajouter des notifications </label><br/><br/>	
				<input type="checkbox" name="Name">
				<label for="Name">Consulter les notifications </label><br/><br/>	
				<input type="checkbox" name="Name">
				<label for="Name">Gérer les sous utilisateurs </label><br/><br/>	
				<input type="checkbox" name="Name">
				<label for="Name">Gérer les maisons </label><br/><br/>	
        </div>
        <div class="autorisation">
            <h4>Autorisations</h4>
        </div>
    </div>
    <div class="resume">
        <h4>Liste sous utilisateur</h4>
    </div>
</div>

<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>