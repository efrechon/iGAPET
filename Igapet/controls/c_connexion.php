<?php

include('models/m_connexion.php');

function connexion_iGAPET($db){
    if(authentification($db) == 'OK'){
        header('Location:index.php?pageAction=accueil');
    }
    else{
        header('Location:index.php?pageAction=connexion');
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