<?php

include ('controls/c_config.php');
connexion_BDD();

$email = $_POST["emailI"];
$password = $_POST["passwordI"];
$sql= "INSERT INTO users VALUE(NULL, NULL, NULL, $email, date(d/m/Y), $password, NULL, NULL)";
$query=$db->prepare($sql); 
$query->execute();

?>