<?php

include('models/m_admin.php');

function ajouter_composants($db){
    if(isset($_POST['typeNCA'])){
        if($_POST['typeNCA']== 'captors'){
            if(isset($_POST['nameNCA'],$_POST['uniteNCA'])){
                inscription_type_capteurs($db);
                header('Location:index.php?pageAction=admini');
            }
        }
        elseif($_POST['typeNCA']== 'actuators'){
            if(!empty($_POST['nameNCA']) AND !empty($_POST['uniteNCA'])){
                inscription_type_actionneurs($db);
            }
        }
    }
}
?>