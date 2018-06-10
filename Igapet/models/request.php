<?php
	include("../controls/c_config.php");

	$donnees = getSQL($db,"SELECT * FROM users WHERE UserID=1")[0]['Mail'];
	
	echo $donnees;
	



?>