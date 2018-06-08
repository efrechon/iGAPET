<link rel="stylesheet" href="style/scenarios.css">

<!-- Nom de la page -->
<?php $nom_page = "Scénarios"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<div id="scenario">
    <div class="ajout">
        <h3>Ajouter un scénario</h3>
				    <?php
                    echo '<input type="checkbox" name="Partout">'.'Partout'.'<br/>';
                    ?>
                    
                    
                    <select id="HouseSelect">
					<option value='' disabled selected>Choisir une maison spécifique</option>
					<?php
					$donnees= getSQL($db,"SELECT Name, HouseID FROM houses WHERE UserID=".$_SESSION['UserID']);
					foreach($donnees as $d){
						echo '<option value='.$d['HouseID'].'>'.$d['Name'].'</option></br>';
					}
					?>
				</select>
				<button type="button" onclick='AjHouse()'> + </button>
				<br/><br/>
                <input type="hidden" id="selectionHList" value="a" name="selections">
                
                
                <select id="RoomSelect">
					<option value='' disabled selected>Choisir une pièce spécifique</option>
					<?php
					$donnees= getSQL($db,"SELECT Name, RoomID FROM rooms WHERE HouseID=".$_SESSION['HouseID']);
					foreach($donnees as $d){
						echo '<option value='.$d['RoomID'].'>'.$d['Name'].'</option></br>';
					}
					?>
				</select>
				<button type="button" onclick='AjRoom()'> + </button>
				</br></br>
                <input type="hidden" id="selectionRList" value="a" name="selections">
                
                

                <div id="selectionH">
                </div>
                <h4 for="typeA">Type d'actionneur</h4>
    <?php 
    $donnees = getSQL($db,"SELECT ActuatorName, ActuatorTypeID FROM actuatortypes");
    foreach($donnees as $donneesA){
        echo '<input type="radio" name="typeA" value='.$donneesA['ActuatorTypeID'].'>'.$donneesA['ActuatorName'].'<br/>';
    }
    echo '<br/>'
    ?>
    
            <div class="horaire">
                
                <h4>Date et heure</h4>
                <?php
                    echo '<input type="checkbox" name="Permanent">'.'En permanence'.'<br/>'.'<br/>';
                    ?>
                    <label for="datedeb">Date de départ : </label>
                    <input id="datedeb" type="date">
                    <br/>
                    <label for="heuredeb">Heure de départ : </label>
                    <input id="heuredeb" type="time">
                    <br/>
                    <label for="datefin">Date de fin : </label>
                    <input id="datefin" type="date">
                    <br/>
                    <label for="heurefin">Heure de fin : </label>
                    <input id="heurefin" type="time">
                    <br/>

            </div>
            
    <br/>

    <input type="submit" value="Ajouter le scénario">
    </div>

    <div class="calendrier">
        <h3>Calendrier</h3>
    </div>
</div>

<script src="script/s_scenarios.js"></script>

<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>