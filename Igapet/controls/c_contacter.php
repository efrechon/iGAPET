<?php

function envoyer_mail(){
    $destinataire= 'app.igapet@gmail.com';
    $sujet= 'Demande de renseignement';
    $message= $_POST['description'].'<br/> Envoyer par '.$_POST['emailM'];
    mail($destinataire, $sujet, $message);
    echo "Votre message vient d'être envoyé !";
}

function affiche_contact(){
    include ('vues/v_contacter.php');
}