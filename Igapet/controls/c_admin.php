<?php

include('models/m_admin.php');

function ajouter_composants($db){
        if(isset($_POST['nameNT'],$_POST['uniteNT'])){
            inscription_type_capteurs($db);
            header('Location:index.php?pageAction=admini');
        }
        if(isset($_POST['nameNTA'],$_POST['uniteNTA'],$_POST['minNTA'],$_POST['maxNTA'])){
            inscription_type_actionneurs($db);
            header('Location:index.php?pageAction=admini');
        }
}
?>