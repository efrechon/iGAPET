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
	if(isset($_SESSION['UserTypeID']) AND $_SESSION['UserTypeID']==1){
		return true;
	}
	else{
		header('Location:index.php?pageAction=erreur');
		return false;
	}
}
	
// Verifier que le visiteur est un utilisateur
function is_utilisateur(){
    if(isset($_SESSION['UserTypeID']) AND $_SESSION['UserTypeID']==2){
        return true;
    }
    else{
		header('Location:index.php?pageAction=erreur');
        return false;
    }
}

?>
