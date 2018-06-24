<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/visiteur.css"/>
    <link rel="icon" href="img/Logo.png">
    <title>iGAPET</title>
</head>
<body>
<div id=header>
    <?php $nom_page='CGU';
    $_SESSION['Mail'] = 'Invité';
    include 'v_header.php' ?>
</div>
<div id="contain">
    <?php
    $requete= $db->query("SELECT PageContent FROM page WHERE PageName='$nom_page'");
    while($donnees= $requete->fetch()){
        echo "<textarea  class=\"visiteur\" disabled rows='34' cols='185'>".$donnees['PageContent']."</textarea>";
    }
    ?>
</div>

</body>
</html>