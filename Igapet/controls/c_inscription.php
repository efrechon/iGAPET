<?php

require('models/m_inscription.php');

function ajouter_utilisateur(){
    if(verification_mail() && verification_password()){

    }
    else{
        echo "Formulaire n'a pas été rempli correctement";
    }

}

function verification_password(){
    if($_POST['emailI'] != $_POST['verifemailI']){
        echo 'Les deux mails doivent être identiques !';
        return false;
    }
    else{
        echo 'Mail OK';
        return true;
    }
}

function verification_mail(){
    affiche_premiere_inscription();
    if($_POST['passwordI'] != $_POST['verifpasswordI']){
        echo 'Les deux mots de passe doivent être identiques !';
    }
    else{
        echo 'Mot de passe OK';
    }
}

function affiche_premiere_inscription(){
    include('../vues/v_connexion.php');
}

function ajouter_sous_utilisateur(){

}

function affiche_inscription_sous_utilisateur(){

}


?>