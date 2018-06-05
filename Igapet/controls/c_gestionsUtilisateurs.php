<?php


include("c_config.php");
if (isset($_POST['UserID']))
{
	$UserID = $_POST['UserID'];
	$userTypeID = getSQL($db,"SELECT userTypeID FROM users WHERE UserID='$UserID'")[0]['userTypeID'];
	doSQL($db,"DELETE FROM users WHERE UserID='$UserID'");
	doSQL($db,"DELETE FROM usertypes WHERE UserTypeID=".$userTypeID);
}

header('Location:../index.php?pageAction=v_gestionssutilisateurs');
	