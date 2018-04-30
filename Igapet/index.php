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
                include ('controls/c_inscription.php');
                affiche_page_inscription();
            break;
            case "inscription":
                include ('controls/c_inscription.php');
                if(isset($_GET['type'])){
                    if($_GET['type']=='utilisateur'){
                        ajouter_utilisateur();
                    }
                    else if($_GET['type'] == 'sousutilisateur'){
                        ajouter_sous_utilisateur();
                    }
                    else{
                        affiche_acceuil();
                    }
                }
            break;
            case "accueil":
                include ('controls/c_inscription.php');
                affiche_acceuil();
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
                if ((isset($_GET['new']))){
                    if ($_GET['new'] == 'maison'){
                        include ('vues/v_ajoutermaison.php');
                    }
                    else if ($_GET['new'] == 'piece'){
                        include ('vues/v_ajouterpiece.php');
                    }
                    else if ($_GET['new'] == 'capteur'){
                        include ('vues/v_ajoutercapteur.php');
                    }
                    else if ($_GET['new'] == 'actionneur'){
                        include ('vues/v_ajouteractionneur.php');
                    }
                }else{
                    include ('vues/v_gestionmaison.php');
                }
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