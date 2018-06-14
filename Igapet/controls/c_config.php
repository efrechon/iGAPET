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

?>
