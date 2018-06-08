<?php

include('c_config.php');
include('../models/m_admin.php');

if (isset($_POST["type"])) {
    switch ($_POST["type"]) {
        case "type_capteur":
            ajouter_type_capteur($db);
        break;
        case "type_actionneur":
            ajouter_type_actionneur($db);
        break;
        case "message":
            envoyer_message($db);
        break;
        case "sav":
            rapport_panne($db);
        break;
        case "administrateur":
            ajouter_administrateur($db);
        break;
    }
}

function ajouter_type_capteur($db){
    if(isset($_POST['CaptorName'], $_POST['Unit']) && !empty($_POST['CaptorName']) && !empty($_POST['Unit'])){
        inscription_type_capteurs($db);
        header('Location:../index.php?pageAction=v_admin_ajout');
    }
    else{
        header('Location:../index.php?pageAction=v_admin_ajout');
    }
}

function ajouter_type_actionneur($db){
    if(isset($_POST['ActuatorName'], $_POST['Unit'], $_POST['MinimumValue'], $_POST['MaximumValue']) &&!empty($_POST['ActuatorName']) AND !empty($_POST['Unit']) AND !empty($_POST['MinimumValue']) AND !empty($_POST['MaximumValue'])){
        inscription_type_actionneurs($db);
        header('Location:../index.php?pageAction=v_admin_ajout');
    }
    else{
        header('Location:../index.php?pageAction=v_admin_ajout');
    }
}

function envoyer_message($db){
    if(isset($_POST['Demande'], $_POST['Objet']) && !empty($_POST['Demande']) && !empty($_POST['Objet'])){
        envoi_message($db);
        header('Location:../index.php?pageAction=v_contacter');
    }
}

function rapport_panne($db){
    if(isset($_POST['CaptorName'], $_POST['Name'], $_POST['Problem']) && !empty($_POST['CaptorName']) && !empty($_POST['Name']) && !empty($_POST['Problem'])){
        envoi_panne($db);
        header('Location:../index.php?pageAction=v_sav');
    }
}

function ajouter_administrateur($db){
    if(isset($_POST['FirstName'], $_POST['LastName'], $_POST['Mail'], $_POST['UserPassword'], $_POST['UserPassword2']) AND verification_password()){
        inscription_administrateur($db);
        header('Location:../index.php?pageAction=v_admin_accueil');
    }
    else{
        header('Location:../index.php?pageAction=v_admin_utilisateur');
    }

}
?>