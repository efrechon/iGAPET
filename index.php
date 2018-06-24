<?php
    //Connexion à la base de données
    include("controls/c_config.php");
    // Redirection en fonction de l'URL
    if(isset($_SESSION['UserID']) && isset($_GET['pageAction']) && file_exists("vues/".$_GET["pageAction"].".php")){
		$UTID = getSQL($db,"SELECT UserTypeID FROM users WHERE UserID=".$_SESSION['UserID'])[0]['UserTypeID'];
		if ($UTID > 0)
		{
			$tempo = getSQL($db,"SELECT * FROM usertypes WHERE UserTypeID=".$UTID);
			if (count($tempo) != 0)	
				$block = $tempo[0];
			
		}
		include("vues/".$_GET['pageAction'].".php");
    }
    else if(empty($_GET['pageAction']) || !isset($_SESSION['UserID'])) {
        if(isset($_GET['pageAction']) && $_GET['pageAction'] == 'v_cgu_visiteur'){
            include('vues/v_cgu_visiteur.php');
        }
        else{
            include('vues/v_connexion.php');
        }
    }
    else{
        include ('vues/v_erreur.php');
    }

?>