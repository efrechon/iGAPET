
<link rel="stylesheet" href="style/menu.css"/>

<nav>
<div id="myDIV">
    <ul class="conteneur">
        <a href='index.php?pageAction=v_accueil'><li class="onglet">Accueil</li></a>
        <a href='index.php?pageAction=v_vueensemble'--><li class="onglet">Vue d'ensemble</li></a>
        <a href='index.php?pageAction=v_capteurs'--><li class="onglet">Mes capteurs</li></a>
        <a href='index.php?pageAction=v_scenarios'--><li class="onglet">Scénarios</li></a>
        <a href='index.php?pageAction=v_notifications'--><li class="onglet">Notifications</li></a>
        <a href='index.php?pageAction=v_gestionssutilisateurs'--><li class="onglet">Gérer les utilisateurs</li></a>
        <a href='index.php?pageAction=v_gestionmaison'--><li class="onglet">Gérer les maisons</li></a>
        <a href='index.php?pageAction=v_informations'--><li class="onglet">Informations</li></a>
        <a href='index.php?pageAction=v_sav'--> <li class="onglet">SAV</li></a>
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
    var menu = document.getElementById("myDIV").getElementsByClassName('conteneur')[0];
    for(var i=0;i<menu.length;i++){
		if (menu.getElementsByTagName('a')[i].href.split("=")[1] == onglet)
		{
			menu[i].childNodes[0].className ="onglet active";
		}
    }
	</script>
 
</nav>

