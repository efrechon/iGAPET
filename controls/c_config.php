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
	//var_dump($sql);
	try
	{
		$req = $db->prepare($sql);
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
		$req = $db->prepare($sql);
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
		$req = $db->prepare($sql);
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
	if(isset($_SESSION['UserTypeID']) AND $_SESSION['UserTypeID']==-2){
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

function verification_mail($db){
    if (isset($_POST['Mail']) && isset($_POST['Mail2']) && $_POST['Mail'] != NULL) {
        if ($_POST['Mail'] != $_POST['Mail2']) {
            $_SESSION["erreurInscription"] = 'Les deux mails doivent être identiques !';
            return false;
        } else {
            if(verification_existence_mail($db)== 'OK'){
                return true;
            }
            else{
                $_SESSION["erreurInscription"] = "Ce mail existe déja";
                return false;
            }
        }
    } else {
        $_SESSION["erreurInscription"] = "veuillez remplir le champ Mail";
        return false;
    }
}

function verification_password(){
    if (isset($_POST['UserPassword']) && isset($_POST['UserPassword2']) && $_POST['UserPassword'] != NULL){
        if($_POST['UserPassword'] != $_POST['UserPassword2']){
            $_SESSION["erreurInscription"] = 'Les deux mots de passe doivent être identiques !';
            return false;
        }
        else{
            return true;
        }
    }
    else
    {
        $_SESSION["erreurInscription"] = "Veuillez remplir le champ Mot de passe ";
        return false;
    }
}

function verification_cgu(){
    if (isset($_POST['cgu']))
        return true;
    $_SESSION["erreurInscription"] = "Veuillez accepter les cgu";
    return false;
}

function getAllHouses($db){
	if ($_SESSION['UserTypeID'] == 0){
		return (getSQL($db,"SELECT * FROM houses WHERE UserID=".$_SESSION['UserID']));
	}
	$d = getOneSQL($db,"SELECT ParentUserID,CustomAutorisationsHouse FROM usertypes WHERE UserTypeID=".$_SESSION['UserTypeID']);
	$donnees = getSQL($db,"SELECT * FROM houses WHERE UserID=".$d['ParentUserID']);
	
	$autorisations = explode("-",$d['CustomAutorisationsHouse']);
	$return = array();
	foreach($donnees as $a)
	{
		foreach($autorisations as $b)
		{
			if ("H".$a['HouseID'] == $b)
			{
				array_push($return,$a);
				break;
			}
		}
	}
	return $return;
	
}

function getAllCaptors($db,$sql){
	if ($_SESSION['UserTypeID'] == 0){
		return (getSQL($db,"SELECT * FROM captors ".$sql));
	}
	$d = getOneSQL($db,"SELECT CustomAutorisationsCaptor FROM usertypes WHERE UserTypeID=".$_SESSION['UserTypeID']);
	$donnees = getSQL($db,"SELECT * FROM captortypes");
	
	$autorisations = explode("-",$d['CustomAutorisationsCaptor']);
	$cType = array();
	foreach($donnees as $a)
	{
		foreach($autorisations as $b)
		{
			if ("C".$a['CaptorTypeID'] == $b)
			{
				array_push($cType,$a['CaptorTypeID']);
				break;
			}
		}
	}
	
	$captorList = getSQL($db,"SELECT * FROM captors ".$sql);
	$return = array();
	foreach ($captorList as $c)
	{
		foreach($cType as $a)
		{
			if ($c['CaptorTypeID'] == $a)
			{
				array_push($return,$c);
				break;
			}
		}
	}
	
	return $return;
	
}

function getAllCaptorTypes($db,$sql){
	if ($_SESSION['UserTypeID'] == 0){
		return (getSQL($db,"SELECT * FROM captortypes ".$sql));
	}
	$d = getOneSQL($db,"SELECT CustomAutorisationsCaptor FROM usertypes WHERE UserTypeID=".$_SESSION['UserTypeID']);
	$donnees = getSQL($db,"SELECT * FROM captortypes ".$sql);
	
	$autorisations = explode("-",$d['CustomAutorisationsCaptor']);
	$cType = array();
	foreach($donnees as $a)
	{
		foreach($autorisations as $b)
		{
			if ("C".$a['CaptorTypeID'] == $b)
			{
				array_push($cType,$a);
				break;
			}
		}
	}
	return $cType;	
}

function getAllActuators($db,$sql){
	if ($_SESSION['UserTypeID'] == 0){
		return (getSQL($db,"SELECT * FROM actuators ".$sql));
	}
	$d = getOneSQL($db,"SELECT CustomAutorisationsCaptor FROM usertypes WHERE UserTypeID=".$_SESSION['UserTypeID']);
	$donnees = getSQL($db,"SELECT * FROM actuatortypes");
	
	$autorisations = explode("-",$d['CustomAutorisationsCaptor']);
	$aType = array();
	foreach($donnees as $a)
	{
		foreach($autorisations as $b)
		{
			if ("A".$a['ActuatorTypeID'] == $b)
			{
				array_push($aType,$a['ActuatorTypeID']);
				break;
			}
		}
	}
	$captorList = getSQL($db,"SELECT * FROM actuators ".$sql);
	$return = array();
	foreach ($captorList as $c)
	{
		foreach($aType as $a)
		{
			if ($c['ActuatorTypeID'] == $a)
			{
				array_push($return,$c);
				break;
			}
		}
	}
	
	return $return;
}

function getAllActuatorType($db,$sql){
	if ($_SESSION['UserTypeID'] == 0){
		return (getSQL($db,"SELECT * FROM actuatortypes ".$sql));
	}
	$d = getOneSQL($db,"SELECT CustomAutorisationsCaptor FROM usertypes WHERE UserTypeID=".$_SESSION['UserTypeID']);
	$donnees = getSQL($db,"SELECT * FROM actuatortypes ".$sql);
	
	$autorisations = explode("-",$d['CustomAutorisationsCaptor']);
	$aType = array();
	foreach($donnees as $a)
	{
		foreach($autorisations as $b)
		{
			if ("A".$a['ActuatorTypeID'] == $b)
			{
				array_push($aType,$a);
				break;
			}
		}
	}
	return $aType;
}

?>
