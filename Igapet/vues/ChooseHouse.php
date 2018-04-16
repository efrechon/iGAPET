<?php

require('../controls/Home.php');

$UserID  ="";

if (isset($_POST['UserID'])) {
    $UserID = $_POST['UserID'];
}
?>
<body>
	<div style="width:500px;height:300px;position:relative;border-style:solid;border-color:black;">
		<h3> Room </h3>
		<form action="../models/AddToDatabase.php" method="post">
			Name: <input type="text" name="Name"><br>
			xPosition: <input type="text" name="xPosition"><br>
			yPosition: <input type="text" name="yPosition"><br>
			Width: <input type="text" name="Width"><br>
			Height: <input type="text" name="Height"><br>
			floor: <input type="text" name="Floor"><br>
			<select name="HouseID">
				<?php
				$sql = "SELECT * FROM houses WHERE UserID=".$UserID."";
				$houses = get($db,$sql);
				foreach($houses as $house)
				{
					echo '<option value ="'.$house["HouseID"].'"> '.$house["Name"].'</option>';
				}
				?>
			</select>
			<input type="hidden" name="Table" value="rooms">
			<input type="submit">
		</form>
	</div>

	<div style="width:500px;height:300px;position:relative;border-style:solid;border-color:black;">
		<form action="ChooseFloor.php" method="post">
			<h4>House :</h4>
			<select name="HouseID">
				<?php
				$sql = "SELECT * FROM houses WHERE UserID=".$UserID."";
				$houses = get($db,$sql);
				foreach($houses as $house)
				{
					echo '<option value ="'.$house["HouseID"].'"> '.$house["Name"].'</option>';
				}
				?>
			</select>
			<input type="submit">
		</form>
		<form action="Site.php" method="post">
			<input type="submit" value="return">
		</form>
	</div>
</body>