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
		header('Location:../index.php?pageAction=v_accueil');
	}
	else{
		$_SESSION["erreurConnection"] = "Cet association compte et mot de passe n'existe pas";
		header('Location:../index.php?pageAction=v_connexion');
	}
}




?>