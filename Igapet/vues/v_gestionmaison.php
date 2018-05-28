<link rel="stylesheet" href="style/gestionmaison.css">

<!-- Nom de la page -->
<?php $nom_page = "Gérer les maisons"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<div id="gestionmaison">
    <div class="identitemaison">
        <ul>
            <?php 
			$donnees = getSQL($db,"SELECT Name,HouseID FROM houses WHERE UserID=".$_SESSION['UserID']);
            foreach($donnees as $donneesM){
                echo '<li class="A">'.$donneesM['Name'].'<ul>';
                $donnees2= getSQL($db,"SELECT Name,RoomID FROM rooms WHERE HouseID=".$donneesM['HouseID']);
                foreach($donnees2 as $donneesP){
                    echo '<li class="B">'.$donneesP['Name'].'<ul>';
                    $donnees3= getSQL($db,"SELECT CaptorTypeID FROM captors WHERE RoomID=".$donneesP['RoomID']);
                    foreach($donnees3 as $donneesC){
                        $donnees5= getSQL($db,"SELECT CaptorName FROM captortypes WHERE CaptorTypeID=".$donneesC['CaptorTypeID']);
                        foreach($donnees5 as $donneesC2){
                            echo '<li class="C">'.$donneesC2['CaptorName'].'</li>';
                        }
                    }
                    $donnees4= getSQL($db,"SELECT ActuatorTypeID FROM actuators WHERE RoomID=".$donneesP['RoomID']);
                    foreach($donnees4 as $donneesA){
                        $donnees6= getSQL($db,"SELECT ActuatorName FROM actuatortypes WHERE ActuatorTypeID=".$donneesA['ActuatorTypeID']);
                        foreach($donnees6 as $donneesA2){
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
        <a href='index.php?pageAction=v_ajoutermaison' class="ajouter">Ajouter une maison</a><br/><br/><br/><br/>
        <a href='index.php?pageAction=v_ajouterpiece' class="ajouter">Ajouter une pièce</a><br/><br/><br/><br/>
        <a href='index.php?pageAction=v_ajoutercapteur' class="ajouter">Ajouter un capteur</a><br/><br/><br/><br/>
    </div>
</div>
<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>