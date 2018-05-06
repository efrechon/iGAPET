<?php

include('models/m_actionneur');

function gestion_actionneur($db){
    if($_POST['triA'] == 'triPiece'){
        $idhome= $_POST['triA'];
        $requeteTriPA= $db->query('SELECT Name,RoomID FROM rooms WHERE HouseID=$idhome');
        while($triPA= $requeteTriPA->fetch()){
            $idroom= $triPA['RoomID'];
            echo'<fieldest>';
            echo'<legend>'.$triPA['Name'].'</legend>';
            $requeteTriPA2= $db->query('SELECT ActuatorTypeID, State FROM actuators WHERE RoomID=$idroom');
            while($triPA2= $requeteTriPA2->fetch()){
                $idactionneur= $triPA2['ActuatorTypeID'];
                $requeteTriPA3= $db->query('SELECT ActuatorName, Unit FROM actuatortypes WHERE ActuatorID=$idactionneur');
                while($triPA3= $requeteTriPA3->fetch()){
                    echo '<div class="actionneur">'.$triPA3['ActuatorName'].'<br/>'.$triPA2['State'].$triPA3['Unit'].'</div>';
                }
            }
        }
        echo'</fieldest>';
    }
}

?>