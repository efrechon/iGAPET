<?php

require('Config.php');
if (isset($_POST['Table']))
{	
	$tab = $_POST['Table'];
	
	if ($tab == 'users')
	{
		try
		{
			$FirstName = $_POST['LastName'];
			$LastName = $_POST['FirstName'];
			$Mail = $_POST['Mail'];
			$sql = "INSERT INTO users (FirstName,LastName,Mail) 
			VALUES ('$FirstName','$LastName','$Mail')";
			$query = $db->prepare($sql);
			$query->execute();
		}
		catch(PDOException $e) 
		{
			echo $e->getMessage();
		}
	}
	else if($tab == 'houses')
	{
		try
		{
			$UserID = $_POST['UserID'];
			$Name = $_POST['Name'];
			$Address = $_POST['Address'];
			$City = $_POST['City'];
			$NumberOfFloor = $_POST['NumberOfFloor'];
			$sql = "INSERT INTO houses (UserID,Name,address,Postal,NumberOfFloor) 
			VALUES ('$UserID','$Name','$Address','$City','$NumberOfFloor')";
			$query = $db->prepare($sql);
			$query->execute();
		}
		catch(PDOException $e) 
		{
			echo $e->getMessage();
		}
	}
	else if ($tab == 'rooms')
	{
		try
		{
			$HouseID = $_POST['HouseID'];
			$Name = $_POST['Name'];
			$xPosition = $_POST['xPosition'];
			$yPosition = $_POST['yPosition'];
			$width = $_POST['Width'];
			$height = $_POST['Height'];
			$floor = $_POST['Floor'];
			$sql = "INSERT INTO rooms (HouseID,Name,xPosition,yPosition,width,height,floor) 
			VALUES ('$HouseID','$Name','$xPosition','$yPosition','$width','$height','$floor')";
			$query = $db->prepare($sql);
			$query->execute();
		}
		catch(PDOException $e) 
		{
			echo $e->getMessage();
		}
	}
	else if ($tab == 'captors')
	{
		try
		{
			$RoomID = $_POST['RoomID'];
			$CaptorType = $_POST['CaptorType'];
			$sql = "INSERT INTO captor (RoomID,CaptorType) 
			VALUES ('$RoomID','$CaptorType')";
			$query = $db->prepare($sql);
			$query->execute();
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	else
	{
		echo "Error, this table doesn't exist : ";
		echo $tab;
	}
}
else
{	
	echo "Error, table not found";
}

echo "return:<a href='http://localhost/Igapet/vues/Site.php'>Click Here to Continue</a>";
?>
