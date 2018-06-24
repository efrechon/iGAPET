<?php

include("c_config.php");
include('../models/m_deletion.php');

if (isset($_POST['HouseID'])){
	houseDeletion($db,$_POST['HouseID']);
}
else if(isset($_POST['RoomID'])){
	roomDeletion($db,$_POST['RoomID']);
}
else if (isset($_POST['CaptorID'])){
	captorDeletion($db,$_POST['CaptorID']);
}
else if (isset($_POST['ActuatorID'])){
	actuatorDeletion($db,$_POST['ActuatorID']);
}

header('Location:../index.php?pageAction=v_gestionmaison');
	
	
	
	
?>