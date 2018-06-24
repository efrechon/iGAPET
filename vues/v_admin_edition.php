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
    <div id="selectionPage">
        <form method="post" action="index.php?pageAction=v_admin_edition">
            <label for="page">Que voulez-vous modifier ?</label><br/><br/>
            <select name="page" id="page">
                <?php
                $requete=$db->query("SELECT PageName FROM page");
                while($donnees= $requete->fetch()){
                    $pageNom= $donnees['PageName'];
                    echo '<option value="'.$pageNom.'"';
                    if(isset($_POST['page']) AND $_POST['page'] == $pageNom){ echo '  selected';};
                    echo ">".$pageNom."</option>";
                }
                ?>
            </select>
            <br/><br/>
            <input type="submit" value="Valider"/>
        </form>
    </div>
    <div id="affichagePage">
        <h3><?php
            $titre = "Veuillez modifier la page ";
            if(isset($_POST['page'])){
                if($_POST['page'] == 'A'){
                    $pageName= 'A Propos';
                    $titre = $titre.'A Propos';
                }
                elseif($_POST['page'] == 'Mentions'){
                    $pageName= 'Mentions Légales';
                    $titre = $titre.'Mentions Légales';
                }
                else{
                    $pageName= $_POST['page'];
                    $titre = $titre.$_POST['page'];
                }
            }
            else{
                $titre = "Vous n'avez pas encore sélectionné la page à modifier";
            }
            echo $titre;
            ?></h3>
        <form method="post" action="controls/c_admin.php" id="modification">
            <input type="hidden" name="type" value="page">
            <input type="hidden" name="PageName" value="<?php echo $pageName;?>">
            <?php
            if(isset($pageName)){
                $requete2= $db->query("SELECT PageContent FROM page WHERE PageName='$pageName'");
                while($donnees2 =$requete2->fetch()){
                    $contenu= $donnees2['PageContent'];
                    echo "<textarea name='PageContent' rows='25' cols='160' form='modification'>$contenu</textarea><br/><br/>";
                    echo "<input type='submit' value='Enregistrer'>";
                }
            }
            else {
            }
            ?>
        </form>
    </div>
</div>
</body>
</html>