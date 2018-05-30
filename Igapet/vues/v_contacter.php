<link rel="stylesheet" href="style/contacter.css">

<!-- Nom de la page -->
<?php $nom_page = "Nous contacter"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<form action="index.php?pageAction=contacter" method="post">
    <div id="mailC">
        <label for="emailM">Votre email : </label>
        <input type="email" name="emailM" value= <?php echo $_SESSION['mail']; ?>><br/><br/>
    </div>
    <label for="description" class="demande">Que pouvons nous faire pour vous ?</label><br/><br/>
    <textarea cols="100" rows="20" name="description"></textarea><br/>
    <input type="submit" value="Envoyer">
</form>

<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>