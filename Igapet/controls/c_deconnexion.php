<?php

function deconnexion(){
    session_unset();
    session_destroy();
    header('Location:index.php?pageAction=connexion');
}