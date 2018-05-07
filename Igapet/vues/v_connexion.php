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
    <br/><p> Soyez capable de répondre &agrave; vos besoins du quotidien sans bouger de votre lit ! </p>
    <div id="contain">
    
        <div id="connexion">
            <h2>Connexion</h2><br/><br/>
            <form action="index.php?pageAction=connexion&new=visit" method="post">
                <label for="emailC">Email : </label>
                <input type="text" name="emailC"><br/><br/>
                <label for="passwordC">Mot de passe : </label>
                <input type="password" name="passwordC"><br/><br/>
               	<a>Mot de passe oublié</a><br/><br/>
                <input type="submit" value="Se connecter"><a href='index.php?pageAction=accueil'></a>
            </form>
        </div>
        <div id="inscription">
            <h2>Inscription</h2><br/><br/>
            <form action='index.php?pageAction=inscription&type=utilisateur' method="post">
                <label for="emailI">Email : </label>
                <input type="email" name="emailI"><br/><br/>
                <label for="verifemailI">Confirmer votre Email : </label>
                <input type="text" name="verifemailI"><br/><br/>
                <label for="passwordI">Mot de passe : </label>
                <input type="password" name="passwordI"><br/><br/>
                <label for="verifpasswordI">Confirmer votre mot de passe : </label>
                <input type="password" name="verifpasswordI"><br/><br/>
                <input type="checkbox" name="cguOk">J'accepte les Conditions Générales d'Utilisation<br/><br/>
                <input type="submit" value="S'inscrire"><a href='index.php?pageAction=accueil'></a>
            </form>
        </div>
        <div id="notreconcept">
        	<h2>Découvrez notre Concept</h2><br/><br/>
        		<div class="concept">
       					 <a>Vita est illis semper in fuga uxoresque mercenariae conductae ad tempus ex pacto atque,
        					ut sit species matrimonii, dotis nomine futura coniunx hastam et tabernaculum offert marito</a>
        		</div>
        
       			<div class="concept">
       					 <a>Vita est illis semper in fuga uxoresque mercenariae conductae ad tempus ex pacto atque,
       						ut sit species matrimonii, dotis nomine futura coniunx hastam et tabernaculum offert marito</a>
       			</div>
       			
           		<div class="concept">
       					 <a>Vita est illis semper in fuga uxoresque mercenariae conductae ad tempus ex pacto atque,
        					ut sit species matrimonii, dotis nomine futura coniunx hastam et tabernaculum offert marito</a>
        		</div>
        
       			<div class="concept">
       					 <a>Vita est illis semper in fuga uxoresque mercenariae conductae ad tempus ex pacto atque,
       						ut sit species matrimonii, dotis nomine futura coniunx hastam et tabernaculum offert marito</a>
       			</div>             

               
        </div>
    </div>
</div>
</body>
</html>