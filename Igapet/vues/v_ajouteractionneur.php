<link rel="stylesheet" href="style/ajout.css">

<!-- Nom de la page -->
<?php $nom_page = "Gestion des maisons"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<h2>Ajouter un actionneur</h2>
<form action="index.php?pageAction=gesmaison&new=actionneur" method="post">
    <?php 
	$donnees= getSQL($db,"SELECT Name,HouseID FROM houses WHERE UserID=".$_SESSION['id']);
    foreach($donnees as $donneesM){
		echo '<input type="radio" name="maison" value='.$donneesM['HouseID'].'>'.$donneesM['Name'].'<select id="Piece" name="localisationPA">';
		$donnees2 = getSQL($db,"SELECT Name,RoomID FROM rooms WHERE HouseID=".$donneesM['HouseID']);
        foreach($donnees2 as $donneesP){
            echo '<option value='.$donneesP['RoomID'].'>'.$donneesP['Name'].'</option><br/>';
        }
		echo '</select><br/>';
    }
    ?>
    <label for="typeA">Type d'actionneur</label><br/><br/>
    <?php 
    $donnees = getSQL($db,"SELECT ActuatorName, ActuatorTypeID FROM actuatortypes");
    foreach($donnees as $donneesA){
        echo '<input type="radio" name="typeA" value='.$donneesA['ActuatorTypeID'].'>'.$donneesA['ActuatorName'].'<br/>';
    }
    ?><br/>
    <input type="submit" value="Ajouter">
</form>
<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>

