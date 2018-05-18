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
        switch($_GET['pageAction']){
            case "connexion":
                include ('controls/c_connexion.php');
                if(isset($_GET['new'])){
                    if($_GET['new'] == 'visit'){
                        connexion_iGAPET($db);
                        include('vues/v_accueil.php');
                    }
                }
                else{
                    include('vues/v_connexion.php');
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
                if(is_utilisateur()){
                    include ('vues/v_accueil.php');
                }
            break;
            case "profil":
                if(is_utilisateur()) {
                    include('controls/c_profil.php');
                    if (isset($_GET['modifier']) && $_GET['modifier'] == 'yes') {
                        modifier_profil($db);
                        affiche_mon_profil();
                    }
                    affiche_mon_profil();
                }
            break;
            case "vueEns":
                if(is_utilisateur()) {
                    include('vues/v_vueensemble.php');
                }
            break;
            case "capteurs":
                if(is_utilisateur()) {
                    include('vues/v_capteurs.php');
                }
            break;
            case "actionneurs":
                if(is_utilisateur()) {
                    include('vues/v_actionneurs.php');
                }
            break;
            case "scenarios":
                if(is_utilisateur()) {
                    include('vues/v_scenarios.php');
                }
            break;
            case "notifs":
                if(is_utilisateur()) {
                    include('vues/v_notifications.php');
                }
            break;
            case "gesutili":
                if(is_utilisateur()) {
                    include('vues/v_gestionssutilisateurs.php');
                }
            break;
            case "gesmaison":
                if(is_utilisateur()) {
                    include('controls/c_inscription.php');
                    if ((isset($_GET['new']))) {
                        if ($_GET['new'] == 'maison') {
                            ajouter_maison($db);
                        } else if ($_GET['new'] == 'piece') {
                            ajouter_piece($db);
                        } else if ($_GET['new'] == 'capteur') {
                            ajouter_capteur($db);
                        } else if ($_GET['new'] == 'actionneur') {
                            ajouter_actionneur($db);
                        }
                    } else {
                        include('vues/v_gestionmaison.php');
                    }
                }
            break;
            case "infos":
                if(is_utilisateur()) {
                    include('vues/v_informations.php');
                }
            break;
            case "sav":
                if(is_utilisateur()) {
                    include('vues/v_sav.php');
                }
            break;
            case "faq":
                include('vues/v_faq.php');
            break;
            case "apropos":
                include ('vues/v_apropos.php');
            break;
            case "contacter":
                include ('controls/c_contacter.php');
                affiche_contact();
                envoyer_mail();
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
            case "admini":
                if(is_administrateur()){
                    if(isset($_GET['modification'])){
                        if($_GET['modification']== 'catalogue'){
                            include('vues/v_admin_modification.php');
                        }
                    }
                    else{
                        include('vues/v_admin_ accueil.php');
                    }
                }
                else{
                    include('vues/v_erreur.php');
                }
        }
    }
    else if(empty($_GET['pageAction'])) {
        include('controls/c_inscription.php');
        include('vues/v_connexion.php');
    }
    else{
        include ('vues/v_erreur.php'); // Page à afficher si problème d'URL
    }

?>