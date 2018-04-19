<!-- Page type de notre site, avec les éléments qui varient : titres & contenu -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style/template.css"/>
    <link rel="icon" href="../img/Logo.png">
    <title>iGAPET</title>
</head>
<body>
<div id=wrapper>
    <div id=header>
        <?php include 'v_header.php' ?>
    </div>
    <div id=nav>
        <?php include 'v_menu.php' ?>
    </div>
    <div id="contain">
        <?= $contenu?> <!-- Définir le contenu à afficher pour chaque page -->
    </div>
</div>
</body>
</html>