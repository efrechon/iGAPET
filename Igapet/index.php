<?php
    //Connexion à la base de données
    include("controls/c_config.php");
    // Redirection en fonction de l'URL
    if(isset($_SESSION['UserID']) && isset($_GET['pageAction']) && file_exists("vues/".$_GET["pageAction"].".php")){
		$UTID = getSQL($db,"SELECT UserTypeID FROM users WHERE UserID=".$_SESSION['UserID'])[0]['UserTypeID'];
		if ($UTID > 0)
			$block = getSQL($db,"SELECT * FROM usertypes WHERE UserTypeID=".$UTID)[0];
		include("vues/".$_GET['pageAction'].".php");
    }
    else if(empty($_GET['pageAction']) || !isset($_SESSION['UserID'])) {
        include('vues/v_connexion.php');
    }
    else{
        // Page à afficher si problème d'URL
        include ('vues/v_erreur.php');
    }

?>

<script src="script/request.js"></script>