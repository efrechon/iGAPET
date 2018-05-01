<?php

include('models/m_connexion.php');

function connect_iGAPET($db){
    if(exists($db) == 'OK'){
        header('Location:index.php?pageAction=accueil');
    }
    else{
        affiche_page_inscription();
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