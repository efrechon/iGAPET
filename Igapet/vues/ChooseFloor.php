<?php

require('../controls/Home.php');

$houseid  ="";

if (isset($_POST['HouseID'])) {
    $houseid = $_POST['HouseID'];
}
?>

<div style="width:300px;height:210px;">
    <h3> Captor </h3>
    <form action="../controls/AddToDatabase.php" method="post">
        Name: <input type="text" name="Name"><br>
        CaptorType: <input type="text" name="CaptorType"><br>
        xPosition: <input type="text" name="xPosition"><br>
        yPosition: <input type="text" name="yPosition"><br>
        <select name="RoomID">
            <?php
            $sql = "SELECT * FROM rooms WHERE HouseID=".$houseid."";
            $rooms = get($db,$sql);
            foreach($rooms as $room)
            {
                echo '<option value ="'.$room['RoomID'].'"> '.$room['Name'].'</option>';
            }

            ?>
        </select>
		<input type="hidden" name="Table" value="captors">
        <input type="submit">
    </form>
</div>

<form action="DrawFloor.php" method="post">
    <h4>Floor :</h4>
    <select name="Floor">
        <?php

        $sql = "SELECT * FROM houses WHERE HouseID=".$houseid."";
        $req = $db->prepare($sql);
        $req->execute();

        $houses = $req->fetchAll(PDO::FETCH_ASSOC);

        //echo $houses;

        for ($x = 1; $x <= $houses[0]['NumberOfFloor']; $x++) {
            echo '<option value ='.$x.'> '.$x.' </option>';
        }

        ?>
    </select>
    <input type="hidden" name="HouseID" value=<?php echo $houseid; ?>>
    <input type="submit">
</form>
<form action="ChooseHouse.php" method="post">
    <input type="submit" value="return">
</form>