<?php
/**
 *  Index du site
 */

    // Début de la session
    session_start();

    // Connexion à la base de données
    require ('controls/c_config.php');

    // Redirection en fonction de l'URL
    if(!isset($_GET['page']) ){
        // Controleur de la page souhaitée

    }
    else{
        // Page à afficher si problème d'URL
    }

?>