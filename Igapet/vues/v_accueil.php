<link rel="stylesheet" href="style/accueil.css">

<!-- Nom de la page -->
<?php $nom_page = "Accueil"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<div id="full">
	<div id="Notifications">
    	<div class="Moyenne">
        	<h4>Notifications</h4>
		</div>
		<div id=infos>
            <?php if(!isset($_SESSION['FirstName'])){
                echo "Veuillez compléter votre profil";
            }
            ?>
            <?php
            if (isset($_SESSION['FirstName'])){
                echo 'Bonjour '.$_SESSION['FirstName'].',';
            }
            else {
                echo 'Bonjour,';
            }
            echo "<br>";
            $nb= count(getAllHouses($db));
            if($nb == 0){
                echo "Vous n'avez pas encore de maison enregistrée.";
            }
            else if($nb == 1) {
                echo "Vous avez actuellement ".$nb." maison.";
            }
            else{
                echo "Vous avez actuellement ".$nb." maisons.";
            }
            ?>
       </div>
    </div>

	<div id="Informations">
	    
        <p>Choisir votre maison par défaut :
        <!-- Choisir sa maison par défaut pour la suite du site -->
                <?php
                $donneesList= getAllHouses($db);
                foreach($donneesList as $donnees){
                    $nomM= $donnees['Name'];
                    $idhome= $donnees['HouseID'];
                    echo '<input type="radio" name="choice" value='."$idhome".'>'.$nomM.'     ';
                }
                ?>
            </p>
        <div class="Moyenne">
            <h4>Bilan de la maison</h4>
            <?php
                $requeteC= getAllCaptorTypes($db,"");
				foreach($requeteC as $donnessC){
                    $url= $donnessC['url_img'];
                    $id= $donnessC['CaptorTypeID'];
                    echo '<div class="bilan">'.$donnessC['CaptorName'].'<br/>';
                    echo '<img src='."$url".'><br/>';
                    echo 'Moyenne : ';
                    $requete2=$db->query("SELECT AVG(Value) as avg FROM captors WHERE CaptorTypeId=$id AND RoomID IN (SELECT RoomID FROM rooms WHERE HouseID=13)");
                    while($donnees=$requete2->fetch()){
                        echo number_format($donnees['avg'],1);
                    }
                    echo $donnessC['Unit'].'<br/>';
                    echo 'Consigne : <input type="number"><br/>';
                    echo '<input type="submit" value="Envoyer">';
                    echo '</div>';
                }
                echo '<br/>';
                $requeteA= getAllActuatorType($db,"");
				foreach($requeteA as $donnessA){
                    $url= $donnessA['url_img'];
                    $idA= $donnessA['ActuatorTypeID'];
                    echo '<div class="bilan">'.$donnessA['ActuatorName'].'<br/>';
                    echo '<img src='."$url".'><br/>';
                    if($donnessA['Unit']== NULL){
                        echo ' / <br/>';
                        echo '<input type="button" value="OFF"><br/>';
                    }
                    else{
                        $requeteA2=$db->query("SELECT AVG(State) as avg FROM actuators WHERE ActuatorTypeID='$idA' AND RoomID IN (SELECT RoomID FROM rooms WHERE HouseID=13)");
                        while($donnessA2= $requeteA2->fetch()){
                            echo 'Moyenne : '.$donnessA2['avg'].$donnessA['Unit'].'<br/>';
                        }
                        echo 'Consigne : <input type="number"><br/>';
                    }
                    echo '<input type="submit" value="Envoyer">';
                    echo '</div>';
                }
            ?>
    	</div>
    </div>
</div>


<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>