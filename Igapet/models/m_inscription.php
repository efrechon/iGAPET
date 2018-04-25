<?php

$email= $_POST["emailI"];
$password= $_POST["passwordI"];
$data= array(NULL, NULL, NULL, $email, date("Y-m-d"), $password, NULL, NULL);
$sql= "INSERT INTO users VALUES(?,?,?,?,?,?,?,?)";
$query=$db->prepare($sql); 
$query->execute($data);

?>