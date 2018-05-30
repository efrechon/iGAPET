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
            <select name="HouseID" onchange='this.form.submit()'>
					<?php
					if (!isset($_SESSION["HouseID"])){
						echo "<option value='' disabled selected>Choisir la maison</option>";
					}
					$donnees= getSQL($db,"SELECT Name, HouseID FROM houses WHERE UserID=".$_SESSION['id']);
					foreach($donnees as $d){
						echo '<option value="'.$d['HouseID'].'"';
						if (isset($_SESSION["HouseID"]) && $_SESSION["HouseID"] == $d['HouseID']){
							echo " selected";					
						}
						echo '>'.$d['Name'].'</option>';
					}
					?>
            </select>

            <?php
                    echo '<input type="checkbox" name="ajoutH">'.'ajouter'.'<br/>';
                    ?>
                    
                    
                    <?php 
                    $id= $_SESSION['UserID'];
                    $requeteM= $db->query("SELECT Name,HouseID FROM Houses WHERE UserID=$id");
                    while($donneesM= $requeteM->fetch()){
                        $idhome= $donneesM['HouseID'];
                        $requeteP= $db->query("SELECT Name,RoomID FROM Rooms WHERE HouseID=$idhome");
                        echo '<select id="Piece" name="localisationP">';
                        while($donneesP = $requeteP->fetch()){
                            $piece= $donneesP['Name'];
                            $idp= $donneesP['RoomID'];
                            echo '<option value='."$idp".'>'.$piece.'</option><br/>';
                        }
                    }
            ?>
            <?php
                echo '<input type="checkbox" name="ajoutH">'.'ajouter'.'<br/>';
            ?><br/>
            <div style=" overflow:scroll;width:50%; height:20%; border:#000000 1px solid; margin-left:24%;" class="liste">            
                <h4>Maisons/pièces sélectionnées</h4>

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
                    <input type="Date de départ" name="datedeb"><br/><br/>
                    <label for="heuredeb">Heure &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
                    <input type="Heure" name="heuredeb"><br/><br/>
                    <label for="datefin">Date de fin : </label>
                    <input type="Date de fin" name="datefin"><br/><br/>
                    <label for="heurefin">Heure: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <input type="Heure" name="heurefin"><br/><br/>

            </div>
            
    <br/>
    <input type="submit" value="Ajouter le scénario">
    </div>

    <div class="calendrier">
        <h3>Calendrier</h3>
    </div>
</div>
<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>