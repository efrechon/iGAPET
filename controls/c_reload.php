<?php


session_start();
//var_dump($_POST);
if (isset($_POST["HouseID"]) && isset($_POST["link"])){
	$_SESSION["HouseID"] = $_POST["HouseID"];
	header('Location:../index.php?pageAction='.$_POST["link"]);
}
echo "error HouseID or link is not defined";