<link rel="stylesheet" href="style/ajout.css">

<!-- Nom de la page -->
<?php $nom_page = "Gestion des maisons"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<h2>Ajouter un capteur</h2>
<form action="index.php?pageAction=gesmaison&new=capteur" method="post">
    <?php $db=connexion_BDD();
    $id= $_SESSION['id'];
    $requeteM= $db->query("SELECT Name,HouseID FROM houses WHERE UserID=$id");
    while($donneesM= $requeteM->fetch()){
        $idhome= $donneesM['HouseID'];
        $requeteP= $db->query("SELECT Name,RoomID FROM rooms WHERE HouseID=$idhome");
        echo '<input type="radio" name="maison" value='."$idhome".'>'.$donneesM['Name'].'<select id="Piece" name="localisationP">';
        while($donneesP = $requeteP->fetch()){
            $piece= $donneesP['Name'];
            $idp= $donneesP['RoomID'];
            echo '<option value='."$idp".'>'.$piece.'</option><br/>';
        }
    }
    echo '</select><br/>';
    ?>
    <label for="typeC">Type de capteur </label><br/><br/>
    <?php $db= connexion_BDD();
    $requeteC = $db->query("SELECT CaptorName, CaptorTypeID FROM captortypes");
    while($donneesC= $requeteC->fetch()){
        $idC= $donneesC['CaptorTypeID'];
        $nomC= $donneesC['CaptorName'];
        echo '<input type="radio" name="typeC" value='."$idC".'>'.$nomC.'<br/>';
    }
    ?><br/>
    <input type="submit" value="Ajouter">
</form>
<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>