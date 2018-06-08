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
            $idvisiteur= $_SESSION['UserID'];
            $req= $db->query("SELECT COUNT(*) as nb FROM houses WHERE UserID=$idvisiteur");
            $don= $req->fetch();
            $req->closeCursor();
            if($don['nb'] == 0){
                echo "Vous n'avez pas encore de maison enregistrée.";
            }
            else if($don['nb'] == 1) {
                echo "Vous avez actuellement ".$don['nb']." maison.";
            }
            else{
                echo "Vous avez actuellement ".$don['nb']." maisons.";
            }
            ?>
       </div>
    </div>

	<div id="Informations">
	    
        <p>Choisir votre maison par défaut :
        <!-- Choisir sa maison par défaut pour la suite du site -->
                <?php
                $donneesList= getSQL($db,"SELECT Name, HouseID FROM houses WHERE UserID=".$_SESSION['UserID']);
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
                $requeteC= $db->query("SELECT * FROM captortypes");
                while($donnessC= $requeteC->fetch()){
                    $url= $donnessC['url_img'];
                    echo '<div class="bilan">'.$donnessC['CaptorName'].'<br/>';
                    echo '<img src='."$url".'><br/>';
                    echo 'Moyenne : '.$donnessC['Unit'].'<br/>';
                    echo 'Consigne : <input type="number"><br/>';
                    echo '<input type="submit" value="Envoyer">';
                    echo '</div>';
                }
                echo '<br/>';
                $requeteA= $db->query("SELECT * FROM actuatortypes");
                while($donnessA= $requeteA->fetch()){
                    $url= $donnessA['url_img'];
                    echo '<div class="bilan">'.$donnessA['ActuatorName'].'<br/>';
                    echo '<img src='."$url".'><br/>';
                    if($donnessA['Unit']== NULL){
                        echo ' / <br/>';
                        echo '<input type="button" value="OFF"><br/>';
                    }
                    else{
                        echo 'Moyenne : '.$donnessA['Unit'].'<br/>';
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