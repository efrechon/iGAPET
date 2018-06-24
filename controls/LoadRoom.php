<?php

$HouseID  ="";
$Floor ="";
$m = false;
if (isset($_POST['HouseID'])) {
	$_SESSION["HouseID"] = $_POST['HouseID'];
	$_SESSION["Floor"] = 1;
}
if (isset($_POST['Floor'])) {
	$_SESSION["Floor"] = $_POST['Floor'];
}
if (isset($_SESSION["HouseID"]) && $_SESSION["HouseID"]!="")
{
	$HouseID = $_SESSION["HouseID"];
	$m = true;
}
else
{
	$data = getSQL($db,"SELECT HouseID FROM houses WHERE UserID=".$_SESSION['UserID']." LIMIT 1");
	if (count($data)){
		$HouseID = (int)$data[0]["HouseID"];
		$m = true;
	}
}
$Rooms = "";
$captorArray = "";
$actuatorArray="";
if ($m){
	if (isset($_SESSION["Floor"])){
		$Floor = $_SESSION["Floor"];
	}
	else
	{
		$Floor = 1;
	}
	$Rooms = getSQL($db,"SELECT * FROM Rooms WHERE HouseID=".$HouseID." AND Floor=".$Floor);
	$captorArray = array();
	foreach($Rooms as $Room)
	{
		$sqlcap = "SELECT * FROM Captors WHERE RoomID=".$Room["RoomID"];
		$captors =getSQL($db,$sqlcap);
		$captorArray['.$RoomID.'] = array();
		foreach($captors as $captor)
		{
			$captorArray[] = $captor;
		}
	}
}
else
{
	echo "Vous n'avez pas de maison, veuillez en ajouter";
}
?>
