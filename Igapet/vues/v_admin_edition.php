<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/admin_edition.css"/>
    <link rel="icon" href="img/Logo.png">
    <title>iGAPET</title>
</head>
<body>
<div id=header>
    <?php $nom_page="Administration";
    include('v_header.php');?>
</div>
<div id=nav>
    <?php include ('v_admin_menu.php');?>
</div>
<div id="full">
<form method="post" action="index.php?pageAction=v_admin_formmodif">
   <p>
       <label for="page">Que voulez-vous modifier ?</label><br />
       <select name="page" id="page">
           <option value="1">FAQ</option>
           <option value="2">CGU</option>
           <option value="3">A propos</option>
           <option value="4">Mentions légales</option>
       </select>
	   <input type="submit" value="Valider"/>
   </p>
   
</form>

<?php
if (isset($_POST["page"])){
	header('Location: ../v_admin_formmodif.php');
	}
?>
</div>