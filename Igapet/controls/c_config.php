<?php

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

function is_administrateur(){
	if($_SESSION['user_type']==1){
		return true;
	}
	else{
		return false;
	}
}

function is_utilisateur(){
    if($_SESSION['user_type']==2){
        return true;
    }
    else{
        return false;
    }
}

//Toutes les possibilités pour pageAction dans l'URL
$possibilitiesPA=array(
    'connexion',
    'inscription',
    'profil',
    'accueil',
    'vueEns',
    'capteurs',
    'actionneurs',
    'scenarios',
    'notifs',
    'gesutili',
    'gesmaison',
    'infos',
    'sav',
    'faq',
    'apropos',
    'contacter',
    'cgu',
    'mentionsl',
    'deconnexion',
	'admini');

?>
