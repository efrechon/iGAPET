<link rel="stylesheet" href="style/accueil.css">

<!-- Nom de la page -->
<?php $nom_page = "Accueil"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<div id="full">
    <div id="Notifications">
        <fieldset>
            <legend>Notifications</legend>
            <?php if(!isset($_SESSION['FirstName'])){
                echo "Veuillez compléter votre profil";
            }
            ?>
            <?php
            if (isset($_SESSION['FirstName'])){
                echo 'Bonjour '.$_SESSION['FirstName'].', ';
            }
            else {
                echo 'Bonjour, ';
            }
            $idvisiteur= $_SESSION['UserID'];
            $req= $db->query("SELECT COUNT(*) as nb FROM houses WHERE UserID=$idvisiteur");
            $don= $req->fetch();
            $req->closeCursor();
            if($don['nb'] == 0){
                echo "vous n'avez pas encore de maison enregistrée.";
            }
            else if($don['nb'] == 1) {
                echo "vous avez actuellement ".$don['nb']." maison.";
            }
            else{
                echo "vous avez actuellement ".$don['nb']." maisons.";
            }
            ?>
        </fieldset>
    </div>
    <div id="other">
        <a href="index.php?pageAction=v_scenarios">
            <img src="img/calendar.png" alt="calendrier">
        </a>
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
        <div class="moyenne">
            <h5>Bilan de la maison</h5><br/>
            <?php
                $requeteC= $db->query("SELECT * FROM captortypes");
                while($donnessC= $requeteC->fetch()){
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