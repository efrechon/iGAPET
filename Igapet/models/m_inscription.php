<?php

function inscription_utilisateur($db){
    // Récupération des valeurs
    $Mail= $_POST["Mail"];
    $CreationDate= date('Y-m-d');
    $UserPassword = password_hash($_POST['UserPassword'], PASSWORD_BCRYPT);
    $UserTypeID= 1;
	$NbrConnexion=0;
    // Préparation de la requete SQL
    $requete= $db->prepare('INSERT INTO users(Mail, CreationDate, UserPassword, UserTypeID,NbrConnexion) VALUES(:Mail,:CreationDate,:UserPassword,:UserTypeID,:NbrConnexion)');

    // Affectation des valeurs
    $requete->bindParam(':Mail',$Mail);
    $requete->bindParam(':CreationDate',$CreationDate);
    $requete->bindParam(':UserPassword',$UserPassword);
    $requete->bindParam(':UserTypeID',$UserTypeID);
	$requete->bindParam(':NbrConnexion',$NbrConnexion);

    // Execution de la requete
    $requete->execute();
}

function inscription_maison($db){
    $Name=htmlspecialchars($_POST['Name']);
    $Address=htmlspecialchars($_POST['Address']);
    $PostalCode=htmlspecialchars($_POST['PostalCode']);
    $Country=htmlspecialchars($_POST['Country']);
    $NumberOfFloor=htmlspecialchars($_POST['NumberOfFloor']);
    $id= $_SESSION['UserID'];

    $requeteM=$db->prepare('INSERT INTO houses(Name, Address, PostalCode, Country, NumberOfFloor, UserID) VALUES (:Name,:Address,:PostalCode,:Country,:NumberOfFloor,:id)');

    $requeteM->bindParam(':Name',$Name);
    $requeteM->bindParam(':Address',$Address);
    $requeteM->bindParam(':PostalCode',$PostalCode);
    $requeteM->bindParam(':Country',$Country);
    $requeteM->bindParam(':NumberOfFloor',$NumberOfFloor);
    $requeteM->bindParam(':id',$id);

    $requeteM->execute();
    $requeteM->closeCursor();
}

function inscription_piece($db){
    $HouseID=$_POST['HouseID'];
    $Name= htmlspecialchars($_POST['Name']);
	$Width= htmlspecialchars($_POST['Width']);
    $Height= htmlspecialchars($_POST['Height']);
    $Floor= htmlspecialchars($_POST['Floor']);

    $requeteP=$db->prepare("INSERT INTO rooms(HouseID, Name, Width, Height, Floor) VALUES (:HouseID,:Name,:Width,:Height,:Floor)");

    $requeteP->bindParam(':HouseID',$HouseID);
    $requeteP->bindParam(':Name',$Name);
	$requeteP->bindParam(':Width',$Width);
    $requeteP->bindParam(':Height',$Height);
    $requeteP->bindParam(':Floor',$Floor);

    $requeteP->execute();
    $requeteP->closeCursor();
}

function inscription_capteur($db){
    $RoomID= $_POST['RoomID'];
    $TypeID= $_POST['TypeID'];

    $requeteC=$db->prepare("INSERT INTO captors(RoomID, CaptorTypeID) VALUES (:RoomID, :TypeID)");

    $requeteC->bindParam(':RoomID', $RoomID);
    $requeteC->bindParam(':TypeID', $TypeID);

    $requeteC->execute();
    $requeteC->closeCursor();
}

function inscription_actionneur($db){
    $RoomID=$_POST['RoomID'];
    $TypeID=$_POST['TypeID'];
    $requeteA=$db->prepare("INSERT INTO actuators(RoomID, ActuatorTypeId) VALUES (:RoomID, :TypeID)");

    $requeteA->bindParam(':RoomID', $RoomID);
    $requeteA->bindParam(':TypeID', $TypeID);

    $requeteA->execute();
    $requeteA->closeCursor();
}

function verification_existence_mail($db){
    $mailexist= 'OK';
    $Mail= $_POST['Mail'];
    $requete= $db->prepare('SELECT Mail FROM users ');
    $requete->bindParam(':Mail',$Mail);
    $requete->execute();
    while($saved = $requete->fetch()){
        if ($saved['Mail']== $Mail){
            $mailexist= 'KO';
            break;
        }
    }
    return $mailexist;
}

function inscription_sous_utilisateur($db){
	
	$ParentUserID = $_SESSION['UserID'];
	$ManageUsers = 0;
	if (isset($_POST['ManageUsers']))
		$ManageUsers = 1;
	$AddScenarios = 0;
	if (isset($_POST['AddScenarios']))
		$AddScenarios = 1;
	$AddNotifications = 0;
	if (isset($_POST['AddNotifications']))
		$AddNotifications = 1;
	$ManageHouses = 0;
	if (isset($_POST['ManageHouses']))
		$ManageHouses = 1;
	$ConsultNotifications = 0;
	if (isset($_POST['ConsultNotifications']))
		$ConsultNotifications = 1;	
	

	$CustomAutorisationsHouse = $_POST['CustomAutorisationsHouse'];
	if (isset($_POST['ConsulterToutesMaisons']))
	{
		$CustomAutorisationsHouse = "";
		$donnees = getAllHouses($db);
		foreach($donnees as $d){
			if ($CustomAutorisationsHouse != "")
				$CustomAutorisationsHouse += "-";
			$CustomAutorisationsHouse += "H"+$d['HouseID'];
		}
	}
	
	$CustomAutorisations = $_POST['CustomAutorisationsCaptor'];
	if (isset($_POST['ConsulterTousCapteurs']))
	{
		$CustomAutorisationsCaptor = "";
		$donnees = getSQL($db,"SELECT CaptorTypeID FROM captortypes");
		foreach($donnees as $d){
			if ($CustomAutorisationsCaptor != "")
				$CustomAutorisationsCaptor += "-";
			$CustomAutorisationsCaptor += "C".$d['CaptorTypeID'];
		}
		$donnees = getSQL($db,"SELECT ActuatorTypeId FROM Actuatortypes");
		foreach($donnees as $d){
			if ($CustomAutorisationsCaptor != "")
				$CustomAutorisationsCaptor += "-";
			$CustomAutorisationsCaptor += "A".$d['ActuatorTypeId'];
		}
	}
	
	var_dump($_POST);
	var_dump($CustomAutorisationsCaptor);
	var_dump($CustomAutorisationsHouse);
	
	$requete= $db->prepare('INSERT INTO usertypes(ParentUserID, ManageUsers, AddScenarios,AddNotifications,ConsultNotifications,ManageHouses,CustomAutorisationsHouse,CustomAutorisationsCaptor) 
							VALUES(:ParentUserID, :ManageUsers, :AddScenarios,:AddNotifications,:ConsultNotifications,:ManageHouses,:CustomAutorisationsHouse,:CustomAutorisationsCaptor)');
							
	$requete->bindParam(':ParentUserID',$ParentUserID);
	$requete->bindParam(':ManageUsers',$ManageUsers);
	$requete->bindParam(':AddScenarios',$AddScenarios);
	$requete->bindParam(':AddNotifications',$AddNotifications);
	$requete->bindParam(':ConsultNotifications',$ConsultNotifications);
	$requete->bindParam(':ManageHouses',$ManageHouses);
	$requete->bindParam(':CustomAutorisationsHouse',$CustomAutorisationsHouse);	
	$requete->bindParam(':CustomAutorisationsCaptor',$CustomAutorisationsCaptor);	
	
	$requete->execute();
	
	
	$Mail= $_POST["Name"];
    $CreationDate= date('Y-m-d');
    $UserPassword = password_hash($_POST['UserPassword'], PASSWORD_BCRYPT);
    $UserTypeID = getOneSQL($db,"SELECT UserTypeID FROM usertypes ORDER BY UserTypeID DESC LIMIT 1")["UserTypeID"];
	$NbrConnexion=0;
	
	$requete= $db->prepare('INSERT INTO users(Mail, CreationDate, UserPassword, UserTypeID,NbrConnexion) VALUES(:Mail,:CreationDate,:UserPassword,:UserTypeID,:NbrConnexion)');
	
	$requete->bindParam(':Mail',$Mail);
    $requete->bindParam(':CreationDate',$CreationDate);
    $requete->bindParam(':UserPassword',$UserPassword);
    $requete->bindParam(':UserTypeID',$UserTypeID);
	$requete->bindParam(':NbrConnexion',$NbrConnexion);
	
	$requete->execute();
	
}

?>