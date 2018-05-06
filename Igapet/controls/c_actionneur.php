<?php

include('models/m_actionneur');

function gestion_actionneur($db){
    if($_POST['triA'] == 'triPiece'){
        $idhome= $_POST['triA'];
        $requeteTriPA= $db->query('SELECT Name FROM rooms WHERE HouseID=$idhome');
        $triPA= $requeteTriPA->fetch();
    }
}

?>