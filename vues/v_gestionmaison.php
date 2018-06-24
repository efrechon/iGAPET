<link rel="stylesheet" href="style/gestionmaison.css">

<!-- Nom de la page -->
<?php $nom_page = "Gérer les maisons"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<div id="gestionmaison">
    <div class="identitemaison">
        <ul>
            <?php 
			$donnees = getAllHouses($db);
            foreach($donnees as $donneesM){
                echo '<li class="A">'.$donneesM['Name'].'<form action="controls/c_deletion.php" method="post" onsubmit="return confirm(\'Etes vous sur de vouloir supprimer cette maison?\');"><input type="hidden" name="HouseID" value='.$donneesM['HouseID'].'><input type="image" alt="delete" src="img/close.png"></form><ul>';
                $donnees2= getSQL($db,"SELECT Name,RoomID FROM rooms WHERE HouseID=".$donneesM['HouseID']);
                foreach($donnees2 as $donneesP){
                    echo '<li class="B">'.$donneesP['Name'].'<form action="controls/c_deletion.php" method="post" onsubmit="return confirm(\'Etes vous sur de vouloir supprimer cette pièce?\');"><input type="hidden" name="RoomID" value='.$donneesP['RoomID'].'><input type="image" alt="delete" src="img/close.png"></form><ul>';
                    $donnees3= getAllCaptors($db,"WHERE RoomID=".$donneesP['RoomID']);
                    foreach($donnees3 as $donneesC){
                        $donnees5= getAllCaptorTypes($db,"WHERE CaptorTypeID=".$donneesC['CaptorTypeID']);
                        foreach($donnees5 as $donneesC2){
                            echo '<li class="C">'.$donneesC2['CaptorName'].'<form action="controls/c_deletion.php" method="post" onsubmit="return confirm(\'Etes vous sur de vouloir supprimer ce capteur?\');"><input type="hidden" name="CaptorID" value='.$donneesC['CaptorID'].'><input type="image" alt="delete" src="img/close.png"></form></li>';
                        }
                    }
                    $donnees4= getAllActuators($db,"WHERE RoomID=".$donneesP['RoomID']);
                    foreach($donnees4 as $donneesA){
                        $donnees6= getAllActuatorType($db,"WHERE ActuatorTypeID=".$donneesA['ActuatorTypeID']);
                        foreach($donnees6 as $donneesA2){
                            echo '<li class="C">'.$donneesA2['ActuatorName'].'<form action="controls/c_deletion.php" method="post" onsubmit="return confirm(\'Etes vous sur de vouloir supprimer ce capteur?\');"><input type="hidden" name="ActuatorID" value='.$donneesA['ActuatorID'].'><input type="image" alt="delete" src="img/close.png"></form></li>';
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