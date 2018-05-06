<link rel="stylesheet" href="style/actionneur.css">

<!-- Nom de la page -->
<?php $nom_page = "Mes actionneurs"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<div id="selection">
    <form action="" method="post">
        <select name="triA">
            <option value="triPiece">Trier par pièce</option>
            <option value="triActionneur">Trier par actionneur</option>
        </select>
        <select name="whereA">
            <?php $db=connexion_BDD();
            $id= $_SESSION['id'];
            $requete= $db->query("SELECT Name, HouseID FROM houses WHERE UserID=$id");
            while($donnees= $requete->fetch()){
                $nomM= $donnees['Name'];
                $idhome= $donnees['HouseID'];
                echo ('<option value='."$idhome".'>'.$nomM.'</option>');
            }
            ?>
        </select>
        <input type="submit" value="Valider">
    </form>
</div>
<div id="affichageActionneur">

</div>
<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>
