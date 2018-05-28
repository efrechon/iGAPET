<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/menu.css"/>
</head>

<nav>
<div id="myDIV">
    <ul class="conteneur">
        <a href='index.php?pageAction=v_accueil'><li class="onglet">Accueil</li></a>
        <a href='index.php?pageAction=vueEns'><li class="onglet">Vue d'ensemble</li></a>
        <a href='index.php?pageAction=v_capteurs'><li class="onglet">Mes capteurs</li></a>
        <a href='index.php?pageAction=v_scenarios'><li class="onglet">Scénarios</li></a>
        <a href='index.php?pageAction=v_notifications'><li class="onglet">Notifications</li></a>
        <a href='index.php?pageAction=v_gestionssutilisateurs'><li class="onglet">Gérer les utilisateurs</li></a>
        <a href='index.php?pageAction=v_gestionmaison'><li class="onglet">Gérer les maisons</li></a>
        <a href='index.php?pageAction=v_informations'><li class="onglet">Informations</li></a>
        <a href='index.php?pageAction=v_sav'> <li class="onglet">SAV</li></a>
        <br><br><br>
        <a href='index.php?pageAction=v_faq'><li class="onglet">FAQ</li></a>
        <a href='index.php?pageAction=v_apropos'><li class="onglet">A propos</li></a>
        <a href='index.php?pageAction=v_contacter'><li class="onglet">Nous contacter</li></a>
        <a href='index.php?pageAction=v_cgu'><li class="onglet">CGU</li></a>
        <a href='index.php?pageAction=v_mentionslegales'><li class="onglet">Mentions Légales</li></a>
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
