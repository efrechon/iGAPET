<?php
/**
 *  Index du site
 */

    // Début de la session
    session_start();

    //Connexion à la base de données
    require ('controls/c_config.php');
    $db= connexion_BDD();

    // Redirection en fonction de l'URL
    if(isset($_GET['pageAction']) && in_array($_GET['pageAction'], $possibilitiesPA)){
        switch ($_GET['pageAction']){
            case "connexion":
                include ('controls/c_connexion.php');
                if(isset($_GET['new'])){
                    if($_GET['new'] == 'visit'){
                        connexion_iGAPET($db);
                    }
                }
                else{
                    affiche_page_inscription();
                }
            break;
            case "inscription":
                include ('controls/c_inscription.php');
                if(isset($_GET['type'])){
                    if($_GET['type']=='utilisateur'){
                        ajouter_utilisateur($db);
                    }
                    else if($_GET['type'] == 'sousutilisateur'){
                        ajouter_sous_utilisateur();
                    }
                    else{
                        affiche_page_inscription();
                    }
                }
            break;
            case "accueil":
                include ('controls/c_inscription.php');
                affiche_acceuil();
            break;
            case "profil":
                include ('controls/c_profil.php');
                if(isset($_GET['modifier']) && $_GET['modifier'] == 'yes'){
                    modifier_profil($db);
                    affiche_mon_profil();
                }
                affiche_mon_profil();
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
                include ('controls/c_inscription.php');
                if ((isset($_GET['new']))){
                    if ($_GET['new'] == 'maison'){
                        affiche_new_maison();
                        inscritption_maison($db);
                    }
                    else if ($_GET['new'] == 'piece'){
                        affiche_new_piece();
                        inscription_piece($db);
                    }
                    else if ($_GET['new'] == 'capteur'){
                        include ('vues/v_ajoutercapteur.php');
                    }
                    else if ($_GET['new'] == 'actionneur'){
                        include ('vues/v_ajouteractionneur.php');
                    }
                }else{
                    affiche_gestion_maison();
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
            case "deconnexion":
                include('controls/c_deconnexion.php');
                deconnexion();
            break;
        }
    }
    else if(empty($_GET['pageAction'])) {
        include ('controls/c_inscription.php');
        affiche_page_inscription();
    }
    else{
        // Page à afficher si problème d'URL
        include ('vues/v_erreur.php');
    }

?>