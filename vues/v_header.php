<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/header.css"/>
</head>

<header>
    <img id="logo" src="img/Logo.png" alt="Logo iGAPET">
    <div id="nomSite"><h3>iGAPET</h3></div>
    <h2 id="nomPage"><?php echo $nom_page; ?></h2>
    <a href='index.php?pageAction=v_profil'><p id="nomClient" title="Mon profil">
        <?php if (isset($_SESSION['LastName']) && isset($_SESSION['FirstName'])) {
            echo $_SESSION['FirstName'].' '.$_SESSION['LastName'];
        }
        else{
            echo $_SESSION['Mail'];
        }?></p></a>
    <a href='index.php'><img class="off" src="img/Power.png" title="Deconnexion" alt="Bouton de deconnexion"></a>
</header>