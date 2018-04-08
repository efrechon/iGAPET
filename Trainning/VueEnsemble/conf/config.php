<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "IGAPET";
try{
    $db = new PDO('mysql:host='.$host.';dbname='.$dbname,$user,$pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
    echo 'Erreur : '.$e->getMessage().'<br />';
    echo 'N° : '.$e->getCode();
}
