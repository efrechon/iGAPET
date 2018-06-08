<?php

function ajouter_page($db){
	$PageID=1;
	$r=getSQL($db,"SELECT PageID FROM Page WHERE PageID =".$PageID);
	if (!empty ($r))
	{
		doSQL($db, "DELETE FROM Page WHERE PageID=".$PageID);
	}
	$PageContent= $_POST["FAQ"];
	// Préparation de la requete SQL
	$requete= $db->prepare('INSERT INTO Page(PageID, PageContent) VALUES(:PageID, :PageContent)');
		
	// Affectation des valeurs
	$requete->bindParam(':PageID',$PageID);
	$requete->bindParam(':PageContent', $PageContent);
		
	// Execution de la requete
	$requete->execute();	
}
?>