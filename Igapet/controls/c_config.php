<?php

session_start();

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "IGAPET";
try {
	$db = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
	echo 'Erreur : ' . $e->getMessage() . '<br />';
	echo 'N° : ' . $e->getCode();
}


function connected(){
    if(!$_SESSION['connect']){
        header('Location: index.php?pageAction=connexion');
    }
}

function getSQL(PDO $db,$sql)
{
	try
	{
		$req = $db->prepare(htmlspecialchars($sql));
		$req->execute();

		$result = $req->fetchAll(PDO::FETCH_ASSOC);
	}
	catch(PDOException $e) 
	{
		echo $e->getMessage();
	}
    return $result;
}

function doSQL(PDO $db,$sql)
{
	try{
		$req = $db->prepare(htmlspecialchars($sql));
		$req->execute();
	}
	catch(PDOException $e) 
	{
		echo $e->getMessage();
	}
}


function getOneSQL(PDO $db,$sql)
{
	try
	{
		$req = $db->prepare(htmlspecialchars($sql));
		$req->execute();

		$result = $req->fetch();
	}
	catch(PDOException $e) 
	{
		echo $e->getMessage();
	}
    return $result;
}

function is_administrateur(){
	if(isset($_SESSION['UserTypeID']) AND $_SESSION['UserTypeID']==-1){
		return true;
	}
	return false;
}
	
// Verifier que le visiteur est un utilisateur
function is_utilisateur(){
    if(isset($_SESSION['UserTypeID']) AND $_SESSION['UserTypeID']==0){
        return true;
    }
    else{
		header('Location:index.php?pageAction=erreur');
        return false;
    }
}

function getAllHouses($db){
	if ($_SESSION['UserTypeID'] == 0){
		return (getSQL($db,"SELECT Name, HouseID FROM houses WHERE UserID=".$_SESSION['UserID']));
	}
	$d = getOneSQL($db,"SELECT ParentUserID,CustomAutorisations FROM usertypes WHERE UserTypeID=".$_SESSION['UserTypeID']);
	$donnees = getSQL($db,"SELECT * FROM houses WHERE UserID=".$d['ParentUserID']);
	
	$autorisations = explode("-",$d['CustomAutorisations']);
	$return = array();
	foreach($donnes as $a)
	{
		foreach($autorisations as $b)
		{
			if ("H"+$a == $b)
			{
				array_push($return,$a);
				break;
			}
		}
	}
	return $return;
	
}

?>
