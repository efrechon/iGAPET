<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/admin.css"/>
    <link rel="icon" href="img/Logo.png">
    <title>iGAPET</title>
</head>
<body>
<div id=header>
    <?php $nom_page="Administration";
    include('v_header.php');?>
</div>
<div id=nav>

</div>
<div id="full">
    <div class="composants">
        <h3>Catalogue des composants</h3>
        <table>
            <h4>Capteurs</h4>
            <tr>
                <th>Nom</th>
                <th>Unité</th>
                <th>Nombre</th>
            </tr>
            <?php
            $reqC=$db->query("SELECT CaptorTypeID, CaptorName, Unit FROM captortypes");
            while($c=$reqC->fetch()){
                $id=$c['CaptorTypeID'];
                echo '<tr><td>'.$c['CaptorName'].'</td><td>'.$c['Unit'].'</td>';
                $reqC2=$db->query("SELECT COUNT(*) as nbr FROM captors WHERE CaptorTypeID=$id");
                while($c2=$reqC2->fetch()){
                    echo '<td>'.$c2['nbr'].'</td>';
                }
                echo '</tr>';
            }
            ?>
        </table>
        <h4>Actionneurs</h4>
        <table>
        <tr>
            <th>Nom</th>
            <th>Min</th>
            <th>Max</th>
            <th>Unité</th>
            <th>Nombre</th>
        </tr>
        <?php
        $reqA=$db->query("SELECT ActuatorTypeID, ActuatorName, Unit, MinimumValue, MaximumValue FROM actuatortypes");
        while($a=$reqA->fetch()){
            $id=$a['ActuatorTypeID'];
            echo '<tr><td>'.$a['ActuatorName'].'</td><td>'.$a['MinimumValue'].'</td><td>'.$a['MaximumValue'].'</td><td>'.$a['Unit'].'</td>';
            $reqA2=$db->query("SELECT COUNT(*) as nbr FROM actuators WHERE ActuatorTypeID=$id");
            while($a2=$reqA2->fetch()){
                echo '<td>'.$a2['nbr'].'</td>';
            }
            echo '</tr>';
        }
        ?>
        </table>
        <a href="index.php?pageAction=admini&modification=catalogue"><input type="button" value="Modifier"></a>
    </div>
    <div class="utilisateurs">
        <h3>Liste utilisateur</h3>
        <table>
            <tr>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Mail</th>
                <th>Nombre connexion</th>
                <th>Suppression</th>
            </tr>
            <?php
            $req= $db->query("SELECT UserID, FirstName, LastName, Mail FROM users WHERE UserTypeID!=1");
            while($u= $req->fetch()){
                echo '<tr><td>'.$u['FirstName'].'</td><td>'.$u['LastName'].'</td><td>'.$u['Mail'].'</td></tr>';
            }
            ?>
        </table>
        <input type="button" value="Supprimer">
    </div>
    <div class="edition">
        <h3>Edition des pages</h3>
        <ul>
            <li>CGU</li>
            <li>Mentions Légales</li>
            <li>A propos</li>
        </ul>
        <input type="button" value="Editer">
    </div>
    <div id="messagerie">

    </div>
</div>

</body>
</html>
