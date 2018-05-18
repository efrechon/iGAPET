<?php

include('models/m_connexion.php');

function connexion_iGAPET($db){
    if(empty($_POST['emailC']) || empty($_POST['passwordC'])){
        header('Location:index.php?pageAction=connexion');
    }
    else{
        if(authentification($db) == 'OK'){
            //recup_informations($db);
            if($_SESSION['user_type']==2){
                 header('Location:index.php?pageAction=accueil');
            }
            else if($_SESSION['user_type']==1){
                header('Location:index.php?pageAction=admini');
            }
        }
        else{
            header('Location:index.php?pageAction=connexion');
        }
    }
}

// Affichages
function affiche_page_inscription(){
    include('vues/v_connexion.php');
}

function affiche_acceuil(){
    include('vues/v_accueil.php');
}


?>