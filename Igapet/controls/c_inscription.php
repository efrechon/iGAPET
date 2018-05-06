<?php

include('models/m_inscription.php');

// Fonctions
function ajouter_utilisateur($db){
    if(verification_mail($db) && verification_password() && isset($_POST['cguOk'])){
        inscription_utilisateur($db);
        header('Location:index.php?pageAction=accueil');
    }
    else{
        header('Location:index.php?pageAction=connexion');
        echo "Formulaire n'a pas été rempli correctement";
    }

}

function verification_mail($db){
        if (isset($_POST['emailI']) && isset($_POST['verifemailI'])) {
            if ($_POST['emailI'] != $_POST['verifemailI']) {
                echo 'Les deux mails doivent être identiques !';
                return false;
            } else {
                if(verification_existence_mail($db)== 'OK'){
                    return true;
                }
                else{
                    return false;
                }
            }
        } else {
            echo 'Remplir les mails';
            return false;
        }
}

function verification_password(){
    if($_POST['passwordI'] != $_POST['verifpasswordI']){
        echo 'Les deux mots de passe doivent être identiques !';
        return false;
    }
    else{
        return true;
    }
}

function ajouter_sous_utilisateur($db){

}

function ajouter_maison($db){
    if(isset($_POST['nameM'], $_POST['adresseV'], $_POST['adresseCDP'], $_POST['adresseP'], $_POST['etagesM'])){
        inscritption_maison($db);
        header('Location: index.php?pageAction=gesmaison');
    }
    else{
        header('Location: index.php?pageAction=gesmaison&new=maison');

    }
}

function ajouter_piece($db){
    if(isset($_POST['localisationM'], $_POST['nameP'], $_POST['largeur'], $_POST['longeur'], $_POST['positionX'], $_POST['positionY'], $_POST['etage'])){
        inscritption_piece($db);
        header('Location: index.php?pageAction=gesmaison');
    }
    else{
        header('Location: index.php?pageAction=gesmaison&new=piece');
    }
}

function ajouter_capteur($db){
    if (isset($_POST['maison'], $_POST['localisationP'], $_POST['typeC'])){
        header('Location: index.php?pageAction=gesmaison');
        inscription_capteur($db);
    }
    else{
        header('Location: index.php?pageAction=gesmaison&new=piece');
    }
}

function ajouter_actionneur($db){
    if (isset($_POST['maison'], $_POST['localisationPA'], $_POST['typeA'])){
        header('Location: index.php?pageAction=gesmaison');
        inscription_capteur($db);
    }
    else{
        header('Location: index.php?pageAction=gesmaison&new=piece');
    }
}

// Affichages
function affiche_page_inscription(){
    include('vues/v_connexion.php');
}

function affiche_acceuil(){
    include('vues/v_accueil.php');
}

function affiche_inscription_sous_utilisateur(){
    include('vues/v_gestionssutilisateurs.php');
}

function affiche_gestion_maison(){
    include('vues/v_gestionmaison.php');
}

function affiche_new_maison(){
    include('vues/v_ajoutermaison.php');
}

function affiche_new_piece(){
    include('vues/v_ajouterpiece.php');
}

function affiche_new_capteur(){
    include ('vues/v_ajoutercapteur.php');
}

function affiche_new_actionneur(){
    include('vues/v_ajouteractionneur.php');
}

?>