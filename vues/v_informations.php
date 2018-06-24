<link rel="stylesheet" href="style/informations.css">

<!-- Nom de la page -->
<?php $nom_page = "Informations"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<div id="catalogue">
    <h4>Catalogue des capteurs</h4>
    <table>
        <tr>
            <th>Image</th>
            <th>Nom</th>
            <th>Unité</th>
            <th>Minimum</th>
            <th>Maximum</th>
        </tr>
            <?php
            $req= getAllCaptorTypes($db,"");
            foreach($req as $cap){
                $idimg= $cap['url_img'];
                echo '<tr>';
                echo '<td><img src='."$idimg".'></td>';
                echo '<td>'.$cap['CaptorName'].'</td>';
                echo '<td>'.$cap['Unit'].'</td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '</tr>';
            }
            ?>
            <?php
            $req= getAllActuatorType($db,"");
            foreach($req as $act){
                $idimg= $act['url_img'];
                echo '<tr>';
                echo '<td><img src='."$idimg".'></li>';
                echo '<td>'.$act['ActuatorName'].'</td>';
                echo '<td>'.$act['Unit'].'</td>';
                echo '<td>'.$act['MinimumValue'].'</td>';
                echo '<td>'.$act['MaximumValue'].'</td>';
                echo '</tr>';
            }
            ?>
        </tr>
    </table>
</div>
<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>