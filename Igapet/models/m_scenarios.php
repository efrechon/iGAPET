<?php

function ajouter_scenario($db){
	$PageID=1;
	$r=getSQL($db,"SELECT PageID FROM Page WHERE PageID =".$PageID);
	if (!empty ($r))
	{
		doSQL($db, "DELETE FROM Page WHERE PageID=".$PageID);
	}
    
    
    
    
	// Préparation de la requete SQL
	$requete= $db->prepare('INSERT INTO scenarios(ScenarioID, ActuatorID, CibleState, ActionDate) VALUES(:ScenarioID, :ActuatorID, :Ciblestate, :ActionDate)');
		
	// Affectation des valeurs
	$requete->bindParam(':ScenarioID',$PageID);
	$requete->bindParam(':ActuatorID', $PageContent);
    $requete->bindParam(':CibleState',$PageID);
	$requete->bindParam(':ActionDate', $PageContent);
		
	// Execution de la reque-te
	$requete->execute();	
}
?>