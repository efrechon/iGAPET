<?php


include("c_config.php");
var_dump($_POST);
if (isset($_POST['UserID']))
{
	$UserID = $_POST['UserID'];
	$userTypeID = getSQL($db,"SELECT userTypeID FROM users WHERE UserID='$UserID'");
	var_dump($userTypeID);
	doSQL($db,"DELETE FROM users WHERE UserID=$UserID");
	doSQL($db,"DELETE FROM usertypes WHERE UserTypeID=".$userTypeID);
}

echo "done?";
	