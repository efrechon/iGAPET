<link rel="stylesheet" href="style/actionneur.css">

<!-- Nom de la page -->
<?php $nom_page = "Mes actionneurs"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<div id="selection">
    <form action="index.php?pageAction=actionneurs" method="post">
        <select name="triA">
            <option value="triPiece">Trier par pièce</option>
            <option value="triActionneur">Trier par actionneur</option>
        </select>
        <select name="whereA">
            <?php $db=connexion_BDD();
            $id= $_SESSION['id'];
            $requete= $db->query("SELECT Name, HouseID FROM houses WHERE UserID=$id");
            while($donnees= $requete->fetch()){
                $nomM= $donnees['Name'];
                $idhome= $donnees['HouseID'];
                echo ('<option value='."$idhome".'>'.$nomM.'</option>');
            }
            ?>
        </select>
        <input type="submit" value="Valider">
    </form>
</div>
<div id="affichageActionneur">
    <?php
        $db=connexion_BDD();
        if($_POST['triA'] == 'triPiece'){
            $idhome= $_POST['whereA'];
            $requeteTriPA= $db->query("SELECT Name,RoomID FROM rooms WHERE HouseID=$idhome");
            while($triPA= $requeteTriPA->fetch()){
                $idroom= $triPA['RoomID'];
                echo'<h4>'.$triPA['Name'].'</h4>';
                echo'<div class="pieceP">';
                $requeteTriPA2= $db->query("SELECT ActuatorTypeID, State FROM actuators WHERE RoomID=$idroom");
                while($triPA2= $requeteTriPA2->fetch()){
                    $idactionneur= $triPA2['ActuatorTypeID'];
                    $requeteTriPA3= $db->query("SELECT ActuatorName, Unit FROM actuatortypes WHERE ActuatorTypeID=$idactionneur");
                    while($triPA3= $requeteTriPA3->fetch()){
                        echo '<div class="actionneurM">'.$triPA3['ActuatorName'].'<br/>'.$triPA2['State'].$triPA3['Unit'].'</div>';
                    }
                }
            echo'</div>';
            }
        }
        /*elseif ($_POST['triA']== 'triActionneur'){
            $idhome= $_POST['whereA'];
            $requeteTriA= $db->query("SELECT ActuatorName, ActuatorTypeID FROM actuatortypes");
            while($triA= $requeteTriA->fetch()){
                $idactionneur= $requeteTriA['ActuatorTypeID'];
                echo'<h4>'.$triA['ActuatorName'].'</h4>';
                echo'<div class="actionneurP">';
                $requeteTriA2= $db->query("SELECT RoomID FROM actuators WHERE ActuatorTypeID='$idactionneur' ");
                while($triA2= $requeteTriA2->fetch()){
                    $requeteTriA3= $db->query("SELECT HouseID FROM rooms WHERE RoomID")
                }
            }
            echo '</div>';
        }*/
    ?>
</div>
<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>
