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
    <br/><p> Soyez capable de répondre à vos besoins du quotidien sans bouger de votre lit ! </p>
    
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
         	<a href="#lien"><br/><img id="fleche" src="img/fleche.png" alt="Flèche bas"></a>
        	<h1 id="lien">Découvrez notre concept</h1><br/>
        </div>
        
        <div class="wrapper">
        	<div class="one"><img id="icone" src="img/wifi.png" alt="Symbole Wi-Fi">
        		<h3 id="categories">Communication</h3></div>
  			<div class="two"><img id="icone" src="img/nuage.png" alt="Symbole Nuage">
  				<h3 id="categories">Cloud</h3><br/></div>
  			<div class="three"><img id="icone" src="img/lampe.png" alt="Symbole Lampe">
  				<h3 id="categories">Confort</h3><br/></div>
  			<div class="four"><img id="icone" src="img/cadenas.png" alt="Symbole Cadenas">
  				<h3 id="categories">Sécurité</h3><br/></div>
  			<div class="five"><a>Par l'intermédiaire de notre site internet (partie client), iGAPET va vous permettre de faire intéragir l'ensemble
  								 des objets connectés de votre maison. Les objets connectés sont reliés à des capteurs, qui eux-mêmes sont reliés à un serveur,
  								 qui centralise toutes les commandes. Les technologies que nous utilisons sont le Bluetooth et le Wi-Fi.</a></div>
  			<div class="six"><a>Le cloud computing (en français : l'informatique en nuage) représente l'exploitation de la puissance des serveurs,
  								par le biais d'un réseau, généralement Internet. Ce réseau est partagé, ce qui permettra à plusieurs personnes d'avoir accès
  			 					aux services des objets connectés, à volonté et dans n'importe quelle pièce de la maison.</a></div>
  			<div class="seven"><a>Le confort de l'utilisateur est un point important pour iGAPET. Nous donnons la possibilité aux utilisateurs de
  			 					  réaliser une grande partie des tâches de la vie quotidienne en un seul clic. Par exemple, pouvoir fermer les volets de votre maison,
  			 					  allumer toutes les lampes d'une pièce ou encore augmenter le chauffage d'une pièce, ainsi que de nombreuses autres fonctions.
  			</a></div>
  			<div class="eight"><a>Vous reviez d'une maison sécurisée 24h/24 ? Vous êtes au bon endroit. En effet, iGAPET propose de nombreuses solutions afin de
  								  rendre votre maison hors de danger : caméra connectée, capteurs au niveau des portes et des fenêtres.
  								  Ce qui vous avertira lors d'une intrusion.</a></div>
		</div>
    </div>
</div>
</body>
</html>