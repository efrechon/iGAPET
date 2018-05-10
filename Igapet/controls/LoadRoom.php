<?php
$HouseID  ="";
$Floor ="";
if (isset($_POST['HouseID'])) {
    $HouseID = $_POST['HouseID'];
}
if (isset($_POST['Floor'])) {
    $Floor = $_POST['Floor'];
}
$data = getSQL($db,"SELECT HouseID FROM houses WHERE UserID=".$_SESSION['id']." LIMIT 1");
$HouseID = (int)$data[0]["HouseID"];
$Floor = 1;
$Rooms = getSQL($db,"SELECT * FROM Rooms WHERE HouseID=".$HouseID." AND Floor=".$Floor);
$captorArray = array();
foreach($Rooms as $Room)
{
    $sqlcap = "SELECT * FROM Captors WHERE RoomID=".$Room["RoomID"]."";
    $captors =getSQL($db,$sqlcap);
    $captorArray['.$RoomID.'] = array();
    foreach($captors as $captor)
    {
        $captorArray[] = $captor;
    }
}
?>
