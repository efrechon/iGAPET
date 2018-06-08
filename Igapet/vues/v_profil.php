<link rel="stylesheet" href="style/ajout.css"/>

<!-- Nom de la page -->
<?php $nom_page = "Mon Profil"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<form action="controls/c_profil.php" method="post">
    <!--label for="lastName">Prénom : </label>
    <input type="text" name="FirstName" value="<?php if (isset($_SESSION['FirstName'])) echo $_SESSION['FirstName']?>"><br/><br/>
    <label for="firstName">Nom : </label>
    <input type="text" name="LastName" value="<?php if (isset($_SESSION['LastName'])) echo $_SESSION['LastName']?>"><br/><br/>
    <label for="Mail">Email : </label>
    <input type="text" name="Mail" value="<?php echo $_SESSION['Mail']?>"><br/><br/>
    <label for="UserPassword">Mot de passe : </label>
    <input type="password" name="UserPassword"><br/><br/>
    <label for="Phone">Numéro de téléphone : </label>
    <input type="text" name="Phone" value= "<?php if (isset($_SESSION['Phone'])) echo $_SESSION['Phone']?>"><br/><br/>
    <input type="submit" value="Modifier"-->
</form>
<div class="first">
    <h5>Prénom : <?php if (isset($_SESSION['FirstName'])) echo $_SESSION['FirstName']?></h5>
    <h5>Nom : <?php if (isset($_SESSION['LastName'])) echo $_SESSION['LastName']?></h5>
    <h5>Mail : <?php echo $_SESSION['Mail']?></h5>
    <h5>Numéro de téléphone : <?php if (isset($_SESSION['Phone'])) echo $_SESSION['Phone']?> </h5>
    <input type="button" value="Modifier">
</div>
<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>