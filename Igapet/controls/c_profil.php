<?php

include('models/m_profil.php');

function modifier_profil($db){
    changement_profil($db);
    header('Location:index.php?pageAction=profil');
}

function affiche_mon_profil(){
    include('vues/v_profil.php');
}

?>

