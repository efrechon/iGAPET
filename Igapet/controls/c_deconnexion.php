<?php

function deconnexion(){
    session_unset();
    session_destroy();
    $_SESSION['connect']= false;
    header('Location:index.php?pageAction=connexion');
}