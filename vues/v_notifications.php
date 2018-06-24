<link rel="stylesheet" href="style/notifications.css">

<!-- Nom de la page -->
<?php $nom_page = "Notifications"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<div id="notifications">
	<div class="moyenne" >
		<div class="ajout">
            <form action="controls/c_inscription.php" method="post" id="form">
                <h4>Ajouter une notification</h4>
                <label for="partout">Partout</label><input type="checkbox" name="partout" id="CC">
                <br>
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
                <br/>
                <div id="Autorisation">
                        Maisons
                        <div id="autorisationHouse">
                        </div>
                </div>
                <br/>
                <select id="CaptorSelect">
                    <option value='' disabled selected>Type de capteur</option>
                    <?php
                    $donnees= getSQL($db,"SELECT CaptorTypeId,CaptorName FROM captortypes");
                    foreach($donnees as $d){
                        echo '<option value=C'.$d['CaptorTypeId'].'>'.$d['CaptorName'].'</option></br>';
                    }

                    ?>
                </select>
                <br/><br/>
                <label for="declenchement">Consigne de déclenchement </label>
                <input type="text" name="declenchement" id="N"><br><br>
                <input type="checkbox" name="toujour" id="CC">
                <label for="toujour">Tous les jours</label>
                <br>
                Entre
                <input type="date" name="date" id="N">
                et
                <input type="date" name="date" id="N">
                <br><br>

                <input type="checkbox" name="toujour" id="CC">
                <label for="toujour">Toutes les heures </label>
                <br>
                Entre
                <input type="time" name="time" id="N">
                et
                <input type="time" name="time" id="N">
                <br><br><br/>
                <input type="submit" value="Ajouter" id="sender">
                <input type="hidden" id="autorisationListHouse" value="" name="CustomAutorisationsHouse">
            </form>
        </div>
        <div class="ajout">
        <form action="controls/c_inscription.php" method="post" id="form">
				<h4>Notifications</h4>
				
        </div>
     </div>
</div>

<script src="script/s_notifications.js"></script>
<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>