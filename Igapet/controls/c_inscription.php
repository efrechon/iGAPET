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

function ajouter_sous_utilisateur(){

}

function ajouter_maison($db){
    if(isset($_POST['adresseV'], $_POST['adresseCDP'], $_POST['adresseP'])){
        inscritption_maison($db);
    }
    else{
        header('Location: index.php?pageAction=gesmaison&new=maison');

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

function affiche_ajouter_maison(){

}

?>