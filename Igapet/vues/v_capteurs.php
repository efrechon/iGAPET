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
				echo'<h4>'.$triPC['Name'].'</h4>';
				echo'<div class="pieceP">';
				$requeteTriPC2= $db->query("SELECT CaptorTypeID, Value FROM captors WHERE RoomID=$idroom");
				while($triPC2= $requeteTriPC2->fetch()){
					$idcapteur= $triPC2['CaptorTypeID'];
					$requeteTriPC3= $db->query("SELECT CaptorName, Unit, url_img FROM captortypes WHERE CaptorTypeID=$idcapteur");
					while($triPC3= $requeteTriPC3->fetch()){
						$idimg= $triPC3['url_img'];
						echo '<div class="actionneurM">'.$triPC3['CaptorName'].'<br/><img src='."$idimg".'><br/>'.$triPC2['Value'].' '.$triPC3['Unit'].'</div>';
					}
				}
				echo'</div>';
			}
		}
    }
    ?>
</div>
<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>
