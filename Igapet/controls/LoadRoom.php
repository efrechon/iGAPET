<?php
require('Home.php');
$HouseID  ="";
$Floor ="";
if (isset($_POST['HouseID'])) {
    $HouseID = $_POST['HouseID'];
}
if (isset($_POST['Floor'])) {
    $Floor = $_POST['Floor'];
}
$HouseID = 1;
$Floor = 1;
$sql = "SELECT * FROM Rooms WHERE HouseID=$HouseID AND Floor=$Floor";
$Rooms = get($db,$sql);
$captorArray = array();
foreach($Rooms as $Room)
{
    $sqlcap = "SELECT * FROM Captors WHERE RoomID=".$Room["RoomID"]."";
    $captors =get($db,$sqlcap);
    $captorArray['.$RoomID.'] = array();
    foreach($captors as $captor)
    {
        $captorArray[] = $captor;
    }
}
?>