<link rel="stylesheet" href="style/gestionmaison.css">

<!-- Nom de la page -->
<?php $nom_page = "Gérer les maisons"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>

<?php $db=connexion_BDD();
$id= $_SESSION['id'];
$requeteM= $db->query("SELECT Name,HouseID FROM houses WHERE UserID=$id");
    while($donneesM= $requeteM->fetch()){
        $idhome= $donneesM['HouseID'];
        echo '<fieldset class="tourmaison">';
        echo '<legend class="maison">'.$donneesM['Name'].'</legend>';
        $requeteP= $db->query("SELECT Name,RoomID FROM rooms WHERE HouseID=$idhome");
        while($donneesP = $requeteP->fetch()){
            $idroom= $donneesP['RoomID'];
            echo '<fieldset class="tourpiece">';
            echo '<legend>'.$donneesP['Name'].'</legend>';
            $requeteC= $db->query("SELECT CaptorTypeID FROM captors WHERE RoomID=$idroom");
            while($donneesC= $requeteC->fetch()){
                echo $donneesC['CaptorTypeID'].' ';
            }
            echo '</fieldset>';
        }
        echo '</fieldset>';
    }
?>
<a href='index.php?pageAction=gesmaison&new=maison'>Ajouter une maison</a><br/><br/>
<a href='index.php?pageAction=gesmaison&new=piece'>Ajouter une pièce</a><br/><br/>
<a href='index.php?pageAction=gesmaison&new=capteur'>Ajouter un capteur</a><br/><br/>
<a href='index.php?pageAction=gesmaison&new=actionneur'>Ajouter un actionneur</a><br/><br/>

<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>