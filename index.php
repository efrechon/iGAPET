//Index du site

<?php
    // Début de la session
    session_start();

    // Connexion à la base de données


    // Redirection en fonction de l'URL
    if(!empty($_GET['']) AND is_file('controleurs/'.$_GET[''].'.php')){
        // Controleur de la page souhaitée
        include ('controleurs/c_'.$_GET[''].'.php');
    }
    else{
        // Page à afficher si problème d'URL
        include ('controleurs/c_connexion.php');
    }

?>