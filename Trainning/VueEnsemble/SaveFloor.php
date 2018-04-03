<!DOCTYPE html>
<?php

require('Home.php');

$Rooms= "";

print_r($_POST);

if (isset($_POST['Save'])) {
    $Rooms = $_POST['Save'];
	echo "Yepe";
	var_dump($Rooms);
}
else
{
	echo "Nope";
}

?>