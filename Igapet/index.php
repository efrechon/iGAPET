<?php
    //Connexion à la base de données
    include("controls/c_config.php");
    // Redirection en fonction de l'URL
    if(isset($_SESSION['UserID']) && isset($_GET['pageAction']) && file_exists("vues/".$_GET["pageAction"].".php")){
		include("vues/".$_GET['pageAction'].".php");
    }
    else if(empty($_GET['pageAction']) || !isset($_SESSION['UserID'])) {
        include('vues/v_connexion.php');
    }
    else{
        // Page à afficher si problème d'URL
        include ('vues/v_erreur.php');
    }

?>