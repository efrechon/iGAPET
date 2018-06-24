<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/admin_modif.css"/>
    <link rel="icon" href="img/Logo.png">
    <title>iGAPET</title>
</head>
<body>
<div id=header>
    <?php $nom_page="Administration";
    include('v_header.php');
	include('function_inserttag.php');?>
</div>
<div id=nav>
    <?php include ('v_admin_menu.php');?>
</div>
<div id="full">
<?php
if ($_POST["page"]==1){
	$label = "Veuillez remplir la page FAQ :";
	$PageID = 1;
}elseif ($_POST["page"]==2){
	$label = "Veuillez remplir la page CGU :";
	$PageID = 2;
}elseif ($_POST["page"]==3){
	$label = "Veuillez remplir la page A propos :";
	$PageID = 3;
}elseif($_POST["page"]==4){
	$label = "Veuillez remplir la page Mentions légales :";
	$PageID = 4;
}
$textarea = getOneSQL($db,'SELECT PageContent FROM page WHERE PageID='.$PageID)['PageContent'];
?>
<form method ="post" action="controls/c_modifpage.php">
    <div>
        <p>
            <input type="button" value="Title" onclick="insertTag('<h1>','</h1>,'textarea');" />
            <input type="button" value="Gras" onclick="insertTag('<b>','</b>,'textarea');" />
            <input type="button" value="Italique" onclick="insertTag('<i>','</i>,'textarea');" />
                <option value="none" class="selected" selected="selected">Taille</option>
                <option value="ttpetit">Très très petit</option>
                <option value="tpetit">Très petit</option>
                <option value="petit">Petit</option>
                <option value="gros">Gros</option>
                <option value="tgros">Très gros</option>
                <option value="ttgros">Très très gros</option>
            </select>
        </p>
        <p>
            <input name="previsualisation" type="checkbox" id="previsualisation" value="previsualisation" />
            <label for="previsualisation">Prévisualisation automatique</label>
        </p>
    </div>
	<p>
			<label for="FAQ"><?php echo $label ?>
			</label>
			<br />
			<textarea name="FAQ" id="FAQ" rows="10" cols="50">
			<?php echo $textarea ?>
			</textarea>
			<input type="submit" value="Modifier">
	</form>
	</p>
</div>