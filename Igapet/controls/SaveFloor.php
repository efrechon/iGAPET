<!DOCTYPE html>
<?php

require('Home.php');

$Rooms= "";

var_dump($_POST);

if (isset($_POST['Save']) && $_POST['Save'] != "error") {
    $Rooms = $_POST['Save'];
	
	$str = str_split($Rooms);
	$RoomsArray = array();
	$i = 0;
	$k= 0;
	$temp = "";
	foreach($str as $c)
	{
		if ($c == ",")
		{
			$RoomsArray[$k][$i] = $temp;
			$temp = "";
			$i = $i+1;
		}
		else if ($c == ";")
		{
			$RoomsArray[$k][$i] = $temp;
			$k += 1;
			$i = 0;
			$temp = "";
		}
		else
		{
			$temp .= $c;
		}
	}
	for($i = 0;$i <$k;$i++)
	{
		$sql = "UPDATE rooms SET xPosition = " .$RoomsArray[$i][1]. ", yPosition = ".$RoomsArray[$i][2]. " WHERE RoomID = " .$RoomsArray[$i][0];
		dosql($db,$sql);
	}
	
}
else
{
	echo "Error Save not found";
}

?>