<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/header.css"/>
</head>

<header>
    <img id="logo" src="img/Logo.png" alt="Logo iGAPET">
    <div id="nomSite"><h3>iGAPET</h3></div>
    <h2 id="nomPage"><?php echo $nom_page; ?></h2>
    <a href='index.php?pageAction=profil'><p id="nomClient" title="Mon profil">
        <?php if (!empty($_POST['nom'])) {
            echo $_POST['nom'];
        }
        else{
            echo "Nom du client";
        }?></p></a>
    <a href='index.php?pageAction=connexion'><img class="off" src="img/Power.png" title="Deconnexion" alt="Bouton de deconnexion"></a>
</header>