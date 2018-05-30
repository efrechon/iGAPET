<?php

include("c_config.php");
include('../models/m_connexion.php');


if(empty($_POST['Mail']) || empty($_POST['UserPassword'])){
	$_SESSION["erreurConnection"] = "Veuillez remplir tous les champs";
	header('Location:../index.php?pageAction=v_connexion');
}
else{
	if(authentification($db)){
		connect($db);
		if (is_administrateur())
		{
			header('Location:../index.php?pageAction=v_admin_accueil');
		}
		header('Location:../index.php?pageAction=v_accueil');
	}
	else{
		$_SESSION["erreurConnection"] = "Cette association compte et mot de passe n'existe pas";
		header('Location:../index.php?pageAction=v_connexion');
	}
}




?>