<?php
/**
 *  Index du site
 */

    // Début de la session
    session_start();

    // Connexion à la base de données


    // Redirection en fonction de l'URL
    if(!empty($_GET['page']) AND is_file('controleurs/'.$_GET['page'].'.php')){
        // Controleur de la page souhaitée
        include ('controleurs/c_'.$_GET['page'].'.php');
    }
    else{
        // Page à afficher si problème d'URL
        include ('controleurs/c_erreur.php');
    }

?>