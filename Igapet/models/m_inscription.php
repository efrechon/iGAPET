<?php

function inscription_utilisateur($db){
    // Récupération des valeurs
    $Mail= $_POST["Mail"];
    $Date= date('Y-m-d');
    $UserPassword = password_hash($_POST['UserPassword'], PASSWORD_BCRYPT);
    $UserTypeID= 2;
	$NbrConnexion=0;
    // Préparation de la requete SQL
    $requete= $db->prepare('INSERT INTO users(Mail, CreationDate, ConnectDate, UserPassword, UserTypeID,NbrConnexion) VALUES(:Mail,:CreationDate,:ConnectDate,:UserPassword,:UserTypeID,:NbrConnexion)');

    // Affectation des valeurs
    $requete->bindParam(':Mail',$Mail);
    $requete->bindParam(':CreationDate',$Date);
    $requete->bindParam(':ConnectDate',$Date);
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

?>