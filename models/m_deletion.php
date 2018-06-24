<?php
function houseDeletion($db,$HouseID){
	$donnees = getSQL($db,"SELECT RoomID FROM rooms WHERE HouseID='$HouseID'");
	foreach($donnees as $d){
		roomDeletion($db,$d['RoomID']);
	}	
	doSQL($db,"DELETE FROM houses WHERE HouseID='$HouseID'");	
}

function roomDeletion($db,$RoomID){
	doSQL($db,"DELETE FROM captors WHERE RoomID='$RoomID'");
	doSQL($db,"DELETE FROM actuators WHERE RoomID='$RoomID'");
	doSQL($db,"DELETE FROM rooms WHERE RoomID='$RoomID'");
}

function captorDeletion($db,$CaptorID){
	doSQL($db,"DELETE FROM captors WHERE CaptorID='$CaptorID'");
}

function actuatorDeletion($db,$ActuatorID){
	doSQL($db,"DELETE FROM actuators WHERE ActuatorID='$ActuatorID'");
}

?>