<!-- Nom de la page -->
<?php $nom_page = "Vue Ensemble"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<?php include 'controls/LoadRoom.php'?>

<body>
	<div id=drawingctrl>
		<form id="SendBox" action="controls/SaveFloor.php" method="post">
			<input id="sav" type="hidden" name="Save" value="error">
			<input type="submit" onclick="saveToForm()">
		</form>
	</div>
	<div id="drawing"></div>
</body>


<script>
	var Rooms = <?php echo json_encode($Rooms); ?>;
	var captors = <?php echo json_encode($captorArray); ?>;
	console.log("t1");
</script>

<script src="script/drawScipt.js"></script>


<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>