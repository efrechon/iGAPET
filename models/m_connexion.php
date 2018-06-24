<?php

function verifi_mail($db){ // vérifie que le mail est unique
    $mailexist= 'OK';
    $email= $_POST['emailC'];
    $requete= $db->prepare('SELECT Mail FROM users ');
    $requete->bindParam(':mail',$email);
    $requete->execute();
    while($saved = $requete->fetch()){
        if ($saved['Mail']== $email){
            $mailexist= 'KO';
            break;
        }
    }
    return $mailexist;
}

function authentification($db){ //connecte
	$Mail = $_POST['Mail'];
    $donnees= getOneSQL($db,"SELECT UserPassword FROM users WHERE Mail='$Mail'");
	if(password_verify($_POST['UserPassword'],$donnees['UserPassword'])){
		return true;
	}
	else{
		return false;
	}
}

function connect($db){ // définit les $_session
	$Mail = $_POST['Mail'];
	$donnees = getOneSQL($db,"SELECT UserID,FirstName,LastName,Phone,UserTypeID,NbrConnexion FROM users WHERE Mail='$Mail'");
	$_SESSION['connected']= true;
	$_SESSION['Mail']= $_POST['Mail'];
	$_SESSION['UserID']= $donnees['UserID'];
	if($donnees['FirstName'] != NULL){
		$_SESSION['FirstName']= $donnees['FirstName'];
	}
	if($donnees['LastName'] != NULL){
		$_SESSION['LastName']= $donnees['LastName'];
	}
	if($donnees['Phone'] != NULL){
		$_SESSION['Phone']= $donnees['Phone'];
	}
	$donnees2 = getOneSQL($db,"SELECT HouseID FROM houses WHERE UserID=".$_SESSION['UserID']);
	$_SESSION['UserTypeID']=$donnees['UserTypeID'];
	$_SESSION['HouseID'] = $donnees2['HouseID'];
	$_SESSION['Floor'] = 1;
	$NbrConnexion = $donnees["NbrConnexion"];
	$date= date('Y-m-d');
	DOSQL($db,"UPDATE users SET NbrConnexion='$NbrConnexion'+1,ConnectDate='$date' WHERE Mail='$Mail'");
}

?>