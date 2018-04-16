<link rel="stylesheet" href="../style/header.css"/>

<header>
    <img id="logo" src="../img/Logo.png" title="Logo">
    <div id="nomSite"><h3>iGAPET</h3><!--<h6>Produit DOMISEP</h6>--></div>
    <h2 id="nomPage"><?php echo " "; ?></h2>
    <p id="nomClient" title="Mon profil"><?php if (!empty($_POST['nom'])) {
            echo $_POST['nom'];
        }
        else{
            echo "Nom du client";
        }?></p>
    <a href="connexion.php"><img class="off" src="../img/Power.png" alt="Deconnexion"></a>
</header>