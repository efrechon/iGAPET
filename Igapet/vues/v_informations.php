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
                <?php
                $req= $db->query("SELECT CaptorName, url_img FROM captortypes");
                while($cap= $req->fetch()){
                    $idimg= $cap['url_img'];
                    echo '<li>'.$cap['CaptorName'].'  '.'<img src='."$idimg".'></li>';
                }
                ?>
            </ul>
        </div>
        <br/>
        <h5>Actionneurs</h5>
        <div class="catal">
            <ul>
                <?php
                $req= $db->query("SELECT ActuatorName, url_img FROM actuatortypes");
                while($act= $req->fetch()){
                    $idimg= $act['url_img'];
                    echo '<li>'.$act['ActuatorName'].'  '.'<img src='."$idimg".'></li>';
                }
                ?>
            </ul>
        </div>
        <br>
    </fieldset>
</div>
<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>