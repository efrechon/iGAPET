<?php
if (isset($block) && $block['AddScenarios'] == 1 )
	header

?>

<link rel="stylesheet" href="style/scenarios.css">

<!-- Nom de la page -->
<?php $nom_page = "Scénarios"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<div id="scenario">
    <div class="ajout">
        <h3>Ajouter un scénario</h3>
                    <form method="post" action="index.php?pageAction=v_scenario">
                    <input type="checkbox" name="Partout">Partout
                    <!-- faire le post du js-->
                    <select id="HouseSelect">
					<option value='' disabled selected>Choisir une maison spécifique</option>
					<?php
					$donnees= getAllHouses($db);
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
                <h4 for="typeA">Type d'actionneur</h4>
				<?php 
				$donnees = getAllActuatorType($db,"");
				foreach($donnees as $donneesA){
					echo '<input type="radio" name="typeA" value='.$donneesA['ActuatorTypeID'].'>'.$donneesA['ActuatorName'].'<br/>';
				}
				?>
            <div class="horaire">
                
                <h4>Date et heure</h4>
                    <input type="checkbox" name="Permanent">En permanence<br/>
                    <label for="datedeb">Date de départ : </label>
                    <input id="datedeb" name ="datedeb" type="date">
                    <br/>
					 <label for="datefin">Date de fin : </label>
                    <input id="datefin" name ="datefin" type="date">
                    <br/>
                    <label for="heuredeb">Heure de départ : </label>
                    <input id="heuredeb" name ="heuredeb" type="time">
                    <br/>
                    <label for="heurefin">Heure de fin : </label>
                    <input id="heurefin" name ="heurefin" type="time">

					
                    

            </div>
			<br/><br/>
			 <input type="submit" value="Ajouter le scénario">
			 </form>
            
    <br/>

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