<?php

require('c_config.php');

function selectUsers(PDO $db){
    $sql = "SELECT * FROM users";
    $req = $db->prepare($sql);
    $req->execute();

    $result = $req->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function selectHouse(PDO $db){
    $sql = "SELECT * FROM houses";
    $req = $db->prepare($sql);
    $req->execute();

    $result = $req->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function selectroom(PDO $db){
    $sql = "SELECT * FROM rooms";
    $req = $db->prepare($sql);
    $req->execute();

    $result = $req->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function selectCaptor(PDO $db){
    $sql = "SELECT * FROM captors";
    $req = $db->prepare($sql);
    $req->execute();

    $result = $req->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}


function selectAFromB(PDO $db,$A,$userID){

    $sql = "SELECT * FROM ".$A." WHERE ".getMaster($A)."=".$userID."";
    $req = $db->prepare($sql);
    $req->execute();

    $result = $req->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function selectID(PDO $db,$A,$ID){

    $sql = "SELECT * FROM ".$A." WHERE ".getPrimary($A)."=".$ID."";
    $req = $db->prepare($sql);
    $req->execute();

    $result = $req->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function get(PDO $db,$sql)
{
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

function dosql(PDO $db,$sql)
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

function getMaster($a)
{
    if ($a == "rooms")
    {
        return "HouseID";
    }
    if ($a == "houses")
    {
        return "UserID";
    }
}

function getPrimary($a)
{
    if ($a == "rooms")
    {
        return "RoomID";
    }
    if ($a == "users")
    {
        return "UserID";
    }
    if ($a == "houses")
    {
        return "HouseID";
    }
}
