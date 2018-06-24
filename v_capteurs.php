<link rel="stylesheet" href="style/capteur.css">

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
            $donneesList= getAllHouses($db);
            foreach($donneesList as $donnees){
                echo ('<option value='.$donnees['HouseID'].'>'.$donnees['Name'].'</option>');
            }
            ?>
        </select>
        <input type="submit" id="boutonValider" value="Valider">
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
			$data = getAllHouses($db);
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
				$requeteTriPC2= getAllCaptors($db,"WHERE RoomID=".$idroom);
				foreach($requeteTriPC2 as $triPC2){
					$idcapteur= $triPC2['CaptorTypeID'];
					$requeteTriPC3= getAllCaptorTypes($db,"WHERE CaptorTypeID=".$idcapteur);
					foreach($requeteTriPC3 as $triPC3){
						$idimg= $triPC3['url_img'];
						echo '<div class="actionneurM">'.$triPC3['CaptorName'].'<br/><img src='."$idimg".'><br/>'.$triPC2['Value'].' '.$triPC3['Unit'].'</div>';
					}
				}
                $requeteTriPC5= getAllActuators($db,"WHERE RoomID=".$idroom);
				foreach ($requeteTriPC5 as $triPC5){
                    $idactionneur= $triPC5['ActuatorTypeID'];
                    $requeteTriPC4 = getAllActuatorType($db,"WHERE ActuatorTypeID=".$idactionneur);
					foreach($requeteTriPC4 as $triPC4){
                        $idimg2 = $triPC4['url_img'];
                        echo '<div class="actionneurM">'.$triPC4['ActuatorName'].'<br/><img src='."$idimg2".'><br/>'.$triPC5['State'].' '.$triPC4['Unit'].'</div>';
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
            $data = getAllHouses($db);
            if (!count($data)) {
                echo "Vous n'avez pas de maison, veuillez en ajouter";
                $idhome = 0;
            } else {
                $idhome = (int)$data[0]["HouseID"];
            }
        }
        if ($idhome) {
            $requeteTriTC = getAllCaptorTypes($db,"");
			foreach($requeteTriTC as $triTC){
                $idcapteur = $triTC['CaptorTypeID'];
                echo '<h4>' . $triTC['CaptorName'] . '</h4>';
                echo '<div class="pieceP">';
                $requeteTriTC2 = getAllCaptors($db,"WHERE CaptorTypeID=".$idcapteur);
				foreach($requeteTriTC2 as $triTC2){
                    $idroom = $triTC2['RoomID'];
                    $requeteTriTC3 = $db->query("SELECT Name, Floor FROM rooms WHERE HouseID=$idhome AND RoomID=$idroom");
                    while ($triTC3 = $requeteTriTC3->fetch()) {
                        if (isset($triPC2['link']) && isset($triPC2['captorlink']))
							echo '<div class="actionneurM">'.$triPC3['CaptorName'].'<br/><img src='."$idimg".'><br/><div class='.$triPC2['link'].''.$triPC2['captorlink'].'></div>'.$triPC3['Unit'].'</div>';
						else
							echo '<div class="actionneurM">'.$triPC3['CaptorName'].'<br/><img src='."$idimg".'><br/>No value'.$triPC3['Unit'].'</div>';
                    }
                }
                echo '</div>';
            }
            $requeteTriTC4 = getAllActuatorType($db,"");
			foreach($requeteTriTC4 as $triTC4){
                $idactionneur = $triTC4['ActuatorTypeID'];
                echo '<h4>' . $triTC4['ActuatorName'] . '</h4>';
                echo '<div class="pieceP">';
                $requeteTriTC5 = getAllActuators($db,"WHERE ActuatorTypeID=".$idactionneur);
				foreach($requeteTriTC5 as $triTC5){
                    $idroom2 = $triTC5['RoomID'];
                    $requeteTriTC6 = $db->query("SELECT Name, Floor FROM rooms WHERE HouseID=$idhome AND RoomID=$idroom2");
                    while ($triTC6 = $requeteTriTC6->fetch()) {
                        if (isset($triPC5['link']) && isset($triPC5['captlorlink']))
							echo '<div class="actionneurM">'.$triPC4['ActuatorName'].'<br/><img src='."$idimg2".'><br/><button onclick="sendData(\'0001\',\''.$triPC5['link'].'\',\''.$triPC5['captlorlink'].'\')">monter</button><button onclick="sendData(\'0010\',\''.$triPC5['link'].'\',\''.$triPC5['captlorlink'].'\')">arreter</button><button onclick="sendData(\'0100\',\''.$triPC5['link'].'\',\''.$triPC5['captlorlink'].'\')">descendre</button>'.$triPC5['State'].''.$triPC4['Unit'].'</div>';
						else
							echo '<div class="actionneurM">'.$triPC4['ActuatorName'].'<br/><img src='."$idimg2".'><br/>'.$triPC5['State'].''.$triPC4['Unit'].'</div>';
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
