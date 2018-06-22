<link rel="stylesheet" href="style/scenarios.css">

<!-- Nom de la page -->
<?php $nom_page = "Scénarios"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<div id="scenario">
    <div class="ajout">
        <h3>Ajouter un scénario</h3>
                    <form method="post" action="index.php?pageAction=v_scenario">
				    <?php
                    echo '<input type="checkbox" name="Partout">'.'Partout'.'<br/>';
                    ?>
                    </form>
                    <!-- faire le post du js-->
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
				</br>
                <input type="hidden" id="selectionRList" value="a" name="selections">
                
                

                <div id="selectionH">
                </div>
                <form method="post" action="index.php?pageAction=v_scenario">
                <h4 for="typeA">Type d'actionneur</h4>
    <?php 
    $donnees = getSQL($db,"SELECT ActuatorName, ActuatorTypeID FROM actuatortypes");
    foreach($donnees as $donneesA){
        echo '<input type="radio" name="typeA" value='.$donneesA['ActuatorTypeID'].'>'.$donneesA['ActuatorName'].'<br/>';
    }
    ?>
                </form>
            <div class="horaire">
                
                <h4>Date et heure</h4>
                <?php // comment mettre dans la table
                    echo '<input type="checkbox" name="Permanent">'.'En permanence'.'<br/>';
                    ?>
                    <form method="post" action="index.php?pageAction=v_scenarios">
                    <label for="datedeb">Date de départ : </label>
                    <input id="datedeb" name ="datedeb" type="date">
                    <br/>
                    <label for="heuredeb">Heure de départ : </label>
                    <input id="heuredeb" name ="heuredeb" type="time">
                    <br/>
                    <label for="datefin">Date de fin : </label>
                    <input id="datefin" name ="datefin" type="date">
                    <br/>
                    <label for="heurefin">Heure de fin : </label>
                    <input id="heurefin" name ="heurefin" type="time">
                    </form>
                    <form method="post" action="index.php?pageAction=v_scenario">
                    <h8>Répétion</h8>
                    <br/>
				    <?php
                    echo '<input type="radio" name="Repetion" value="Lundi">'.'Lundi'.'<br/>';
                    echo '<input type="radio" name="Repetion" value="Mardi">'.'Mardi'.'<br/>';
                    echo '<input type="radio" name="Repetion" value="Mercredi">'.'Mercredi'.'<br/>';
                    echo '<input type="radio" name="Repetion" value="Jeudi">'.'Jeudi'.'<br/>';
                    echo '<input type="radio" name="Repetion" value="Vendredi">'.'Vendredi'.'<br/>';
                    echo '<input type="radio" name="Repetion" value="Samedi">'.'Samedi'.'<br/>';
                    echo '<input type="radio" name="Repetion" value="Dimanche">'.'Dimanche'.'<br/>';
                    ?>
                    

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