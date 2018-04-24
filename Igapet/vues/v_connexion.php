<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/connexion.css"/>
    <link rel="icon" href="img/Logo.png">
    <title>iGAPET</title>
</head>
<body>
<div id=wrapper>
    <div id=header>
        <h1>iGAPET</h1>
    </div>
    <div id="contain">
        <div id="connexion">
            <h3>Connexion</h3><br/><br/>
            <form action="" method="post">
                <label for="emailC">Email : </label>
                <input type="text" name="emailC"><br/><br/>
                <label for="passwordC">Mot de passe : </label>
                <input type="password" name="passwordC"><br/><br/>
                <input type="submit" value="Se connecter"><a href='index.php?pageAction=accueil'></a>
            </form>
        </div>
        <div id="inscription">
            <h3>Inscription</h3><br/><br/>
            <form action="" method="post">
                <label for="emailI">Email : </label>
                <input type="text" name="email"><br/><br/>
                <label for="verifemailI">Confirmer votre Email : </label>
                <input type="text" name="verifemailI"><br/><br/>
                <label for="passwordI">Mot de passe : </label>
                <input type="password" name="passwordI"><br/><br/>
                <label for="verifpasswordI">Confirmer votre mot de passe : </label>
                <input type="password" name="verifpasswordI"><br/><br/>
                <input type="checkbox">J'accepte les Conditions Générales d'utilisation<br/><br/>
                <input type="submit" value="S'inscrire"><a href='index.php?pageAction=accueil'></a>
            </form>
        </div>
    </div>
</div>
</body>
</html>