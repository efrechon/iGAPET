<!-- Page type de notre site, avec les éléments qui varient : titres & contenu -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style/template.css"/>
        <link rel="icon" href="img/Logo.png">
        <title>iGAPET</title>
    </head>
    <body>
        <div id=header>
            <?php include 'v_header.php' ?>
        </div>
        <div id=nav>
            <?php include 'v_menu.php' ?>
        </div>
        <div id="contain">
            <?= $contenu?> <!-- Définir le contenu à afficher pour chaque page -->
        </div>
		<div id="calendarMain" class="calendarMain"></div>

	
<script type="text/javascript">
//<![CDATA[
	var myCalendar = new jsSimpleDatePickr();
	myCalendar.CalAdd({
		'divId': 'calendarMain',
		'dateMask': 'JJ/MM/AAAA',
		'dateCentury': 20,
		'titleMask': 'M AAAA',
		'navType': '01',
		'classTable': 'jsCalendar',
		'classDay': 'day',
		'classDaySelected': 'selectedDay',
		'monthLst': ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
		'dayLst': ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
		'hideOnClick': false,
		'showOnLaunch': false
		});
	//]]>
	
</script>
	<script type="text/javascript" src="script/calendrier.js"></script>
	
	    </body>
</html>