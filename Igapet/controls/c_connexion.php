<?php

include('models/m_connexion.php');

function connexion_iGAPET($db){
    if(empty($_POST['emailC']) || empty($_POST['passwordC'])){
        header('Location:index.php?pageAction=connexion');
    }
    else{
        if(verification_existence_mail($db)== 'OK'){
            if(authentification($db) == 'OK'){
                recup_informations($db);
                header('Location:index.php?pageAction=accueil');
            }
            else{
                header('Location:index.php?pageAction=connexion');
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