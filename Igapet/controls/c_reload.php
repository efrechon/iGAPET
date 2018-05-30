<?php


session_start();

if (isset($_POST["HouseID"])){
	$_SESSION["HouseID"] = $_POST["HouseID"];
	header('Location:../index.php?pageAction=v_ajoutercapteur');
}
echo "error";