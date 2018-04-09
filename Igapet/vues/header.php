<header>
    <img id="logo" src="../img/Logo.png" title="Logo">
    <h3 id="nomSite">iGAPET</h3>
    <h2 id="nomPage"><?php echo "Accueil"; ?></h2>
    <p id="nomClient" title="Mon profil"><?php if (!empty($_POST['nom'])) {
            echo $_POST['nom'];
        }
        else{
            echo "Nom du client";
        }?></p>
    <a href="connexion.php"><img class="off" src="../img/Power.png" alt="Deconnexion"></a>
</header>