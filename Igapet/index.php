<?php
/**
 *  Index du site
 */

    // Début de la session
    session_start();

    //Connexion à la base de données
    require ('controls/c_config.php');


    // Redirection en fonction de l'URL
    if(isset($_GET['pageAction']) && in_array($_GET['pageAction'], $possibilitiesPA)){
        switch ($_GET['pageAction']){
            case "connexion":
                include('vues/v_connexion.php');
            break;
            case "inscription":
                include('controls/c_inscription.php');
                if(isset($_GET['type'])){
                    if($_GET['type']=='utilisateur'){
                        ajouter_utilisateur();
                    }
                    else if($_GET['type'] == 'sousutilisateur'){
                        ajouter_sous_utilisateur();
                    }
                    else{
                        affiche_premiere_inscription();
                    }
                }
            break;
            case "accueil":
                include('vues/v_accueil.php');
            break;
            case "profil":
                include ('vues/v_profil.php');
            break;
            case "vueEns":
                include ('vues/v_vueensemble.php');
            break;
            case "capteurs":
                include('vues/v_capteurs.php');
            break;
            case "actionneurs":
                include('vues/v_actionneurs.php');
            break;
            case "scenarios":
                include('vues/v_scenarios.php');
            break;
            case "notifs":
                include('vues/v_notifications.php');
            break;
            case "gesutili":
                include ('vues/v_gestionssutilisateurs.php');
            break;
            case "gesmaison":
                include ('vues/v_gestionmaison.php');
            break;
            case "infos":
                include ('vues/v_informations.php');
            break;
            case "sav":
                include ('vues/v_sav.php');
            break;
            case "faq":
                include ('vues/v_faq.php');
            break;
            case "apropos":
                include ('vues/v_apropos.php');
            break;
            case "contacter":
                include ('vues/v_contacter.php');
            break;
            case "cgu":
                include ('controls/c_reglementation.php');
                cgu();
            break;
            case "mentionsl":
                include ('controls/c_reglementation.php');
                mentions_legales();
            break;
        }
    }
    else{
        // Page à afficher si problème d'URL
        echo "Error, problème d'indexage";
    }

?>