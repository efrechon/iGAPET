<link rel="stylesheet" href="style/accueil.css">

<!-- Nom de la page -->
<?php $nom_page = "Accueil"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<div id="full">
    <div id="Notifications">
        <fieldset>
            <legend>Notifications</legend>
            <?php if(!isset($_SESSION['prenom'])){
                echo "Veuillez compléter votre profil";
            }
            ?>
            <?php
            if (isset($_SESSION['prenom'])){
                echo 'Bonjour '.$_SESSION['prenom'].',';
            }
            else {
                echo 'Bonjour,';
            }
            echo "<br>";
            $idvisiteur= $_SESSION['id'];
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
        </fieldset>
    </div>
    <div id="other">
        <a href="index.php?pageAction=scenarios">
            <img src="img/calendar.png" alt="calendrier">
        </a>
    </div>
    <div id="Informations">
        <p>Choisir votre maison par défaut :
            <?php
            $donneesList= getSQL($db,"SELECT Name, HouseID FROM houses WHERE UserID=".$_SESSION['id']);
            foreach($donneesList as $donnees){
                $nomM= $donnees['Name'];
                $idhome= $donnees['HouseID'];
                echo '<input type="radio" value='."$idhome".'>'.$nomM.'     ';
            }
            ?>
        </p>
    </div>
</div>


<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>