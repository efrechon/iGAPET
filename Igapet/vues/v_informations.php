<link rel="stylesheet" href="style/informations.css">

<!-- Nom de la page -->
<?php $nom_page = "Informations"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<div id="catalogue">
    <fieldset>
        <legend>Catalogue</legend>
        <h5>Capteurs</h5>
        <div class="catal">
            <ul>
                <?php $db= connexion_BDD();
                $req= $db->query("SELECT CaptorName FROM captortypes");
                while($cap= $req->fetch()){
                    echo '<li>'.$cap['CaptorName'].'</li>';
                }
                ?>
            </ul>
        </div>
        <br/>
        <h5>Actionneurs</h5>
        <div class="catal">
            <ul>
                <?php $db= connexion_BDD();
                $req= $db->query("SELECT ActuatorName FROM actuatortypes");
                while($act= $req->fetch()){
                    echo '<li>'.$act['ActuatorName'].'</li>';
                }
                ?>
            </ul>
        </div>
        <br>
        <input type="button" value="Modifier">
    </fieldset>
</div>
<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>