<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="iGAPETCSS.css"/>
    <title>iGAPET</title>
</head>
<body>
    <div class="page">
        <?php include 'header.php'?>
        <?php include 'menu.php'?>
        <div class="contain">
            <p>Bienvenue dans la maison de
                <?php if (!empty($_POST['nom'])) {
                    echo $_POST['nom'];
                }
                else{
                    echo " ";
                }?>
            </p>
        </div>
    </div>
</body>
</html>