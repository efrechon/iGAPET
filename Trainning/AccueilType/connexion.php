<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="ConnexionCSS.css"/>
    <title>iGAPET</title>
</head>
<body>
    <div class="page">
        <div id="nomSite">
            <h2>iGAPET</h2>
        </div>
        <div class="connexion">
            <h3>Connexion</h3>
            <form action="iGAPET.php" method="POST">
                Name : <input type="text" name="nom">
                <br><br>
                Mot de passe : <input type="password" name="motDePasse">
                <br><br>
                <input type="submit" value="Se connecter"><a href="iGAPET.php"></a>
            </form>
        </div>
        <div class="inscription">
            <h3>Inscription</h3>
            <form>
                Adresse mail : <input type="email" name="mail"/>
                <br><br>
                Mot de passe : <input type="password" name="motDePasse">
                <br><br>
                Confirmer le mot de passe : <input type="password" name="motDePasse">
                <br><br>
                <input type="radio"> J'accèpte les Conditions Générales d'Utilisation
                <br><br>
                <button type="submit"><a href="iGAPET.php"><?php echo"Se connecter"?></a></button>
            </form>
        </div>
    </div>
</body>
</html>