<?php

function ajouter_scenario($db){
	$ActuatorID= htmlspecialchars($_POST["typeA"]);
	$CibleState= htmlspecialchars($_POST["selections"]);
	$Repetition= htmlspecialchars($_POST["Repetition"]);
	$ActionDateDeb= ($_POST["datedeb"]);
	$ActionDateFin= ($_POST["datefin"]);
	$ActionHeureDeb= ($_POST["heuredeb"]);
	$ActionHeureFin= ($_POST["heurefin"]);

	

    
	// Préparation de la requete SQL
	$requete= $db->prepare('INSERT INTO scenarios(ActuatorID, CibleState, ActionDate) VALUES(ActuatorID, :Ciblestate, :ActionDate)');
		
	// Affectation des valeurs
	$requete->bindParam(':ScenarioID',$PageID);
	$requete->bindParam(':ActuatorID', $ActuatorID);
    $requete->bindParam(':CibleState', $CibleState);
	$requete->bindParam(':ActionDateDeb', $ActionDateDeb);
	$requete->bindParam(':ActionDateFin',$ActionDateFin);
	$requete->bindParam(':ActionHeureDeb', $ActionHeureDeb);
	$requete->bindParam(':ActionHeureFin',$ActionHeureFin);
	$requete->bindParam(':Repetion', $Repetition);
		
	// Execution de la reque-te
	$requete->execute();	
}
?>