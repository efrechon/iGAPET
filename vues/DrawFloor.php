<!DOCTYPE html>

<?php include '../controls/LoadRoom.php'?>

<html>
	<head>
		<link rel="stylesheet" href="../style/style.css"/>
	</head> 
<body>
	<div id=drawingctrl>
		<form id="SendBox" action="../controls/SaveFloor.php" method="post">
			<input id="sav" type="hidden" name="Save" value="error">
			<input type="submit" onclick="saveToForm()">
		</form>
	</div>
	<div id="drawing"></div>
</body>

<script>
	var Rooms = <?php echo json_encode($Rooms); ?>;
	var captors = <?php echo json_encode($captorArray); ?>;
</script>

<script src="../script/drawScript.js"></script>

</html>