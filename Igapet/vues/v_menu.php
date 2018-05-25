<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/menu.css"/>
</head>

<nav>
<div id="myDIV">
    <ul class="conteneur">
        <a href='index.php?pageAction=accueil'><li class="onglet">Accueil</li></a>
        <a href='index.php?pageAction=vueEns'--><li class="onglet">Vue d'ensemble</li></a>
        <a href='index.php?pageAction=capteurs'--><li class="onglet">Mes capteurs</li></a>
        <a href='index.php?pageAction=actionneurs'--><li class="onglet">Mes actionneurs</li></a>
        <a href='index.php?pageAction=scenarios'--><li class="onglet">Scénarios</li></a>
        <a href='index.php?pageAction=notifs'--><li class="onglet">Notifications</li></a>
        <a href='index.php?pageAction=gesutili'--><li class="onglet">Gérer les utilisateurs</li></a>
        <a href='index.php?pageAction=gesmaison'--><li class="onglet">Gérer les maisons</li></a>
        <a href='index.php?pageAction=infos'--><li class="onglet">Informations</li></a>
        <a href='index.php?pageAction=sav'--> <li class="onglet">SAV</li></a>
        <br><br><br>
        <a href='index.php?pageAction=faq'--><li class="onglet">FAQ</li></a>
        <a href='index.php?pageAction=apropos'--><li class="onglet">A propos</li></a>
        <a href='index.php?pageAction=contacter'--><li class="onglet">Nous contacter</li></a>
        <a href='index.php?pageAction=cgu'--><li class="onglet">CGU</li></a>
        <a href='index.php?pageAction=mentionsl'--><li class="onglet">Mentions Légales</li></a>
    </ul>
</div>

    <script>
	var onglet = <?php echo json_encode($_GET['pageAction']); ?>;
    var menu = document.getElementById("myDIV").childNodes[1].childNodes;
    var txt = "http://localhost/iGAPET-master/Igapet/index.php?pageAction="+onglet;
    console.log(txt);
    for(var i=0;i<menu.length;i++){
		if (menu[i].href == txt)
		{
			menu[i].childNodes[0].className ="onglet active";
		}
    }
	</script>
 
</nav>

</html>
