<?php

include("c_config.php");
include('../models/m_inscription.php');
include('../models/m_connexion.php');

if (isset($_POST["type"])){
	switch($_POST["type"]){
		case "utilisateur";
			ajouter_utilisateur($db);
		break;
		case"sousutilisateur";
			ajouter_sous_utilisateur($db);
		break;
		case "connexion";
			verification_mail($db);	
		break;
		case "maison";
			ajouter_maison($db);
		break;
		case "piece";
			ajouter_piece($db);
		break;
		case "capteur";
			ajouter_capteur($db);
		break;
		case "actionneur";
			ajouter_actionneur($db);
	}
}

// Fonctions
function ajouter_utilisateur($db){
    if(verification_mail($db) && verification_password() && verification_cgu()){
        inscription_utilisateur($db);
		connect($db);
        header('Location:../index.php?pageAction=v_accueil');
    }
    else{
		$_SESSION["erreur"] ="Formulaire n'a pas été rempli correctement";
        header('Location:../index.php?pageAction=v_connexion');
    }

}

function ajouter_sous_utilisateur($db){
	if (isset($_POST['UserID']) && !empty($_POST['Name']) )
	{
		modifier_sous_utilisateur($db);
	}
	else if (isset($_POST['UserPassword']) && isset($_POST['UserPassword2']) && isset($_POST['Name']) && !empty($_POST['UserPassword']) && !empty($_POST['UserPassword2']) && !empty($_POST['Name']))
	{
		if ($_POST['UserPassword'] != $_POST['UserPassword'])
		{
			header('Location:../index.php?pageAction=v_gestionssutilisateurs');
		}
		//if (verification_nom($db))
		inscription_sous_utilisateur($db);
	}
	header('Location:../index.php?pageAction=v_gestionssutilisateurs');
	
}


function ajouter_maison($db){
    if(isset($_POST['Name'], $_POST['Address'], $_POST['PostalCode'], $_POST['Country'], $_POST['NumberOfFloor']) 
		&& !empty($_POST['Name']) &&!empty($_POST['Address']) && !empty($_POST['PostalCode']) && !empty($_POST['Country']) && !empty($_POST['NumberOfFloor'])){
        inscription_maison($db);
        header('Location: ../index.php?pageAction=v_gestionmaison');
    }
    else{
		$_SESSION["erreurAjoutMaison"] = "Veuillez remplir tous les champs";
        header('Location: ../index.php?pageAction=v_ajoutermaison');

    }
}

function ajouter_piece($db){
    if(isset($_POST['HouseID'], $_POST['Name'], $_POST['Width'], $_POST['Height'], $_POST['Floor']) 
		&& !empty($_POST['HouseID']) && !empty($_POST['Name']) && !empty($_POST['Width']) && !empty($_POST['Height']) && !empty($_POST['Floor'])){
        inscription_piece($db);
        header('Location: ../index.php?pageAction=v_gestionmaison');
    }
    else{
		$_SESSION["erreurAjoutPiece"] = "Veuillez remplir tous les champs";
        header('Location: ../index.php?pageAction=v_ajouterpiece');
    }
}

function ajouter_capteur($db){
    if (isset($_POST['RoomID'], $_POST['TypeID']) && !empty($_POST['RoomID']) && !empty($_POST['TypeID'])){
		inscription_capteur($db);
        header('Location:../index.php?pageAction=v_gestionmaison');
    }
    else{
		$_SESSION["erreurAjoutCapteur"] = "Veuillez remplir tous les champ";
        header('Location: ../index.php?pageAction=v_ajoutercapteur');
    }
}

function ajouter_actionneur($db){
    if (isset($_POST['RoomID'], $_POST['TypeID'])){
		inscription_actionneur($db);
        header('Location: ../index.php?pageAction=v_gestionmaison');
    }
    else{
		$_SESSION["erreurAjoutCapteur"] = "Veuillez remplir tous les champ";
        header('Location: ../index.php?pageAction=v_ajoutercapteur');
    }
}

?>