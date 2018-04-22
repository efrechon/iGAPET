<?php
/**
 *  Index du site
 */

    // Début de la session
    session_start();

    // Connexion à la base de données
    require ('controls/c_config.php');



    // Redirection en fonction de l'URL
    if(isset($_GET['pageAction'])){
        switch ($_GET['pageAction']){
            case "accueil":
                include('vues/v_accueil.php');
            break;
            case "vueEns":
                include ('vues/Igapet.php');
            break;
            case "capteurs":
                include('vues/v_capteurs.php');
            break;
            case "actionneurs":
                include('vues/v_actionneurs.php');
            break;
            case "scénarios":
            break;
            case "notifs":
            break;
            case "gesutili":
                include ('vues/v_gestionssutilisateurs.php');
            break;
            case "gesmaison":
            break;
            case "infos":
            break;
            case "sav":
            break;
            case "faq":
            break;
            case "apropos":
            break;
            case "contacter":
            break;
            case "cgu":
            break;
            case "mentionsl":
            break;
        }

    }
    else{
        // Page à afficher si problème d'URL
        echo"Problème d'indexage";
    }

?>