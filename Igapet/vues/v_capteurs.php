<link rel="stylesheet" href="style/actionneur.css">

<!-- Nom de la page -->
<?php $nom_page = "Mes capteurs"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<div id="selection">
    <form action="index.php?pageAction=v_capteurs" method="post">
        <select name="triC">
            <option value="triPiece">Trier par pièce</option>
            <option value="triActionneur">Trier par capteur</option>
        </select>
        <select name="whereC">
            <?php
            $donneesList= getSQL($db,"SELECT Name, HouseID FROM houses WHERE UserID=".$_SESSION['UserID']);
            foreach($donneesList as $donnees){
                echo ('<option value='.$donnees['HouseID'].'>'.$donnees['Name'].'</option>');
            }
            ?>
        </select>
        <input type="submit" value="Valider">
    </form>
</div>
<div id="affichageActionneur">
    <?php
    
    if(!isset($_POST['triC']) || $_POST['triC'] == 'triPiece'){
		if (isset($_POST['whereC'])){
			$idhome= $_POST['whereC'];
		}
		else
		{
			$data = getSQL($db,"SELECT HouseID FROM houses WHERE UserID=".$_SESSION['UserID']." LIMIT 1");
			if (!count($data))
			{
				echo "Vous n'avez pas de maison, veuillez en ajouter";
				$idhome =0;
			}
			else
			{
				$idhome = (int)$data[0]["HouseID"];
			}
		}
		if ($idhome){
            $requeteTriPC= $db->query("SELECT Name,RoomID FROM rooms WHERE HouseID=$idhome");
			while($triPC= $requeteTriPC->fetch()){
				$idroom= $triPC['RoomID'];
				echo '<h4>'.$triPC['Name'].'</h4>';
				echo '<div class="pieceP">';
				$requeteTriPC2= $db->query("SELECT CaptorTypeID, Value FROM captors WHERE RoomID=$idroom");
				while($triPC2= $requeteTriPC2->fetch()){
					$idcapteur= $triPC2['CaptorTypeID'];
					$requeteTriPC3= $db->query("SELECT CaptorName, Unit, url_img FROM captortypes WHERE CaptorTypeID=$idcapteur");
					while($triPC3= $requeteTriPC3->fetch()){
						$idimg= $triPC3['url_img'];
						echo '<div class="actionneurM">'.$triPC3['CaptorName'].'<br/><img src='."$idimg".'><br/>'.$triPC2['Value'].' '.$triPC3['Unit'].'</div>';
					}
                    $requeteTriPC4= $db->query("SELECT ActuatorName, Unit, url_img FROM ortypes WHERE CaptorTypeID=$idcapteur");
                    while($triPC4= $requeteTriPC4->fetch()){
                        $idimg2= $triPC4['url_img'];
                        echo '<div class="actionneurM">'.$triPC3['CaptorName'].'<br/><img src='."$idimg".'><br/>'.$triPC2['Value'].' '.$triPC3['Unit'].'</div>';
                    }
				}
				echo '</div>';
			}
            /*$requete1=$db->query("SELECT CapteurNumero, Value FROM trames WHERE TrameID=5");
            while($donnees= $requete1->fetch()){
                $capteur= $donnees['CapteurNumero'];
                $valeur= hexdec($donnees['Value']);
                $requete2=$db->query("UPDATE captors SET Value=$valeur WHERE CaptorID=40");
            }*/
		}
    }
    elseif(!isset($_POST['triC']) || $_POST['triC'] == 'triActionneur') {
        if (isset($_POST['whereC'])) {
            $idhome = $_POST['whereC'];
        } else {
            $data = getSQL($db, "SELECT HouseID FROM houses WHERE UserID=" . $_SESSION['UserID'] . " LIMIT 1");
            if (!count($data)) {
                echo "Vous n'avez pas de maison, veuillez en ajouter";
                $idhome = 0;
            } else {
                $idhome = (int)$data[0]["HouseID"];
            }
        }
        if ($idhome) {
            $requeteTriTC = $db->query("SELECT * FROM captortypes");
            while ($triTC = $requeteTriTC->fetch()) {
                $idcapteur = $triTC['CaptorTypeID'];
                echo '<h4>' . $triTC['CaptorName'] . '</h4>';
                echo '<div class="pieceP">';
                $requeteTriTC2 = $db->query("SELECT CaptorID, Value, RoomID FROM captors WHERE CaptorTypeID=$idcapteur");
                while ($triTC2 = $requeteTriTC2->fetch()) {
                    $idroom = $triTC2['RoomID'];
                    $requeteTriTC3 = $db->query("SELECT Name, Floor FROM rooms WHERE HouseID=$idhome AND RoomID=$idroom");
                    while ($triTC3 = $requeteTriTC3->fetch()) {
                        echo '<div class="actionneurM">'.$triTC3['Name'].'<br/>Etage : '.$triTC3['Floor'].'<br/><b>'.$triTC2['Value'].' '.$triTC['Unit'].'</b></div>';
                    }
                }
                echo '</div>';
            }
            $requeteTriTC4 = $db->query("SELECT * FROM actuatortypes");
            while ($triTC4 = $requeteTriTC4->fetch()) {
                $idactionneur = $triTC4['ActuatorTypeID'];
                echo '<h4>' . $triTC4['ActuatorName'] . '</h4>';
                echo '<div class="pieceP">';
                $requeteTriTC5 = $db->query("SELECT ActuatorID, State, RoomID FROM actuators WHERE ActuatorTypeID=$idactionneur");
                while ($triTC5 = $requeteTriTC5->fetch()) {
                    $idroom2 = $triTC5['RoomID'];
                    $requeteTriTC6 = $db->query("SELECT Name, Floor FROM rooms WHERE HouseID=$idhome AND RoomID=$idroom2");
                    while ($triTC6 = $requeteTriTC6->fetch()) {
                        echo '<div class="actionneurM">'.$triTC6['Name'].'<br/>Etage : '.$triTC6['Floor'].'<br/><b>'.$triTC5['State'].' '.$triTC4['Unit'].'</b></div>';
                    }
                }
                echo '</div>';
            }
        }
    }
    ?>
</div>
<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>
