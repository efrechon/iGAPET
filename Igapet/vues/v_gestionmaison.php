<link rel="stylesheet" href="style/gestionmaison.css">

<!-- Nom de la page -->
<?php $nom_page = "Gérer les maisons"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<div id="gestionmaison">
    <div class="identitemaison">
        <ul>
            <?php 
            $id= $_SESSION['id'];
            $requeteM= $db->query("SELECT Name,HouseID FROM houses WHERE UserID=$id");
            while($donneesM= $requeteM->fetch()){
                $idhome= $donneesM['HouseID'];
                echo '<li class="A">'.$donneesM['Name'].'<ul>';
                $requeteP= $db->query("SELECT Name,RoomID FROM rooms WHERE HouseID=$idhome");
                while($donneesP = $requeteP->fetch()){
                    $idroom= $donneesP['RoomID'];
                    echo '<li class="B">'.$donneesP['Name'].'<ul>';
                    $requeteC= $db->query("SELECT CaptorTypeID FROM captors WHERE RoomID=$idroom");
                    while($donneesC= $requeteC->fetch()){
                        $idcapteur= $donneesC['CaptorTypeID'];
                        $requeteC2= $db->query("SELECT CaptorName FROM captortypes WHERE CaptorTypeID=$idcapteur");
                        while($donneesC2= $requeteC2->fetch()){
                            echo '<li class="C">'.$donneesC2['CaptorName'].'</li>';
                        }
                    }
                    $requeteA= $db->query("SELECT ActuatorTypeID FROM actuators WHERE RoomID=$idroom");
                    while($donneesA= $requeteA->fetch()){
                        $nomactionneur= $donneesA['ActuatorTypeID'];
                        $requeteA2= $db->query("SELECT ActuatorName FROM actuatortypes WHERE ActuatorTypeID=$nomactionneur");
                        while($donneesA2= $requeteA2->fetch()){
                            echo '<li class="C">'.$donneesA2['ActuatorName'].'</li>';
                        }
                    }
                    echo '</ul></li>';
                }
                echo '</ul></li>';
            }
            echo '</ul></ul>';
            ?>
    </div>
    <div class="blocajout">
        <br/><br/>
        <a href='index.php?pageAction=gesmaison&new=maison'>Ajouter une maison</a><br/><br/><br/><br/>
        <a href='index.php?pageAction=gesmaison&new=piece'>Ajouter une pièce</a><br/><br/><br/><br/>
        <a href='index.php?pageAction=gesmaison&new=capteur'>Ajouter un capteur</a><br/><br/><br/><br/>
        <a href='index.php?pageAction=gesmaison&new=actionneur'>Ajouter un actionneur</a><br/><br/><br/><br/>
    </div>
</div>
<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>