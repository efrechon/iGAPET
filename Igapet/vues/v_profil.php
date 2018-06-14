<link rel="stylesheet" href="style/profil.css"/>

<!-- Nom de la page -->
<?php $nom_page = "Mon Profil"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<div class="first">
    <div id="debut">
        <label>Préom : </label><?php if (isset($_SESSION['FirstName'])) echo $_SESSION['FirstName']?><br/><br/>
        <label>Nom : </label><?php if (isset($_SESSION['LastName'])) echo $_SESSION['LastName']?><br/><br/>
        <label>Mail : </label><?php echo $_SESSION['Mail']?><br/><br/>
        <label>Téléphone : </label><?php if (isset($_SESSION['Phone'])) echo $_SESSION['Phone']?><br/><br/>
        <button id="button" onclick="change()">Modifier</button>
    </div>
    <div id="fin">
        <form method="post" action="controls/c_profil.php">
            <label for='FirstName'>Prénom : </label><input type='text' name='FirstName' value="<?php if (isset($_SESSION['FirstName'])) echo $_SESSION['FirstName']?>"><br/>
            <label for='LastName'>Nom : </label><input type='text' name='LastName' value='<?php if (isset($_SESSION['LastName'])) echo $_SESSION['LastName']?>'><br/>
            <label for='Phone'>Téléphone : </label><input type='phone' name='Phone' value="<?php if (isset($_SESSION['Phone'])) echo $_SESSION['Phone']?>"><br/>
            <input type='submit' value='Modifier'>
        </form>
    </div>
</div>
<script>
    document.getElementById("debut").style.visibility = 'visible';
    document.getElementById("fin").style.visibility = 'hidden';
    function change(){
        document.getElementById("debut").style.visibility = 'hidden';
        document.getElementById("fin").style.visibility = 'visible';
    }
</script>
<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>