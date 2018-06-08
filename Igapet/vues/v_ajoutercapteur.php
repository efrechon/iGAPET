<link rel="stylesheet" href="style/ajout.css">

<!-- Nom de la page -->
<?php $nom_page = "Gestion des maisons"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<h2>Ajouter un capteur</h2>

<form action="controls/c_reload.php" method="post">
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

<select name="RoomID" >
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

<form action="controls/c_inscription.php" method="post">
	<select id="Piece" name="RoomID">
		<?php 
			$donnees= getSQL($db,"SELECT Name,RoomID FROM rooms WHERE HouseID=".$_SESSION['HouseID']);
			foreach($donnees as $d){
				echo '<option value='.$d['RoomID'].'>'.$d['Name'].'</option><br/>';
			}
		?>
	</select><br/>
    <label for="TypeID">Type de capteur </label><br/><br/>
    <?php 
    $requeteC = $db->query("SELECT CaptorName, CaptorTypeID FROM captortypes");
    while($donneesC= $requeteC->fetch()){
        $idC= $donneesC['CaptorTypeID'];
        $nomC= $donneesC['CaptorName'];
        echo '<input type="radio" name="TypeID" onclick="document.getElementById(\'capteurOuActionneur\').value=\'capteur\';" value='."$idC".'>'.$nomC.'<br/>';
    }
	$donnees = getSQL($db,"SELECT ActuatorName, ActuatorTypeID FROM actuatortypes");
    foreach($donnees as $donneesA){
        echo '<input type="radio" name="TypeID" onclick="document.getElementById(\'capteurOuActionneur\').value=\'actionneur\';"  value='.$donneesA['ActuatorTypeID'].'>'.$donneesA['ActuatorName'].'<br/>';
    }
    ?><br/>
	<input id="capteurOuActionneur" type="hidden" value="capteur" name="type">
	<?php if (isset($_SESSION["erreurAjoutCapteur"]))
	{
		echo $_SESSION["erreurAjoutCapteur"];
		unset($_SESSION["erreurAjoutCapteur"]);
	}
	?>
	</br>
    <input type="submit" value="Ajouter">
</form>
<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>