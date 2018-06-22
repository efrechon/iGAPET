<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/admin_accueil.css"/>
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
    <div class="composants">
        <h3>Catalogue des composants</h3>
        <table>
            <h4>Capteurs</h4>
            <tr>
                <th>Nom</th>
                <th>Unité</th>
                <th>Nombre</th>
                <th>Panne détécté</th>
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
                $reqC3=$db->query("SELECT COUNT(Fonctionnel) as nbrpanne FROM captors WHERE Fonctionnel= 0 AND CaptorTypeID=$id");
                while($c3=$reqC3->fetch()){
                    echo '<td>'.$c3['nbrpanne'].'</td>';
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
            <th>Panne détécté</th>
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
            $reqA3=$db->query("SELECT COUNT(Fonctionnel) as nbrpanne FROM actuators WHERE Fonctionnel= 0 AND ActuatorTypeID=$id");
            while($a3=$reqA3->fetch()){
                echo '<td>'.$a3['nbrpanne'].'</td>';
            }
            echo '</tr>';
        }
        ?>
        </table>
        <a href="index.php?pageAction=v_admin_ajout"><input type="button" value="Modifier"></a>
    </div>
    <div id="messagerie">
        <h3>Messagerie</h3>
        <?php
        $requete=$db->query("SELECT Correspondant,Objet,Demande,Date FROM messagerie ORDER BY MessagerieID DESC ");
        while($donnees= $requete->fetch()){
            $UserID= $donnees['Correspondant'];
            $requete2= $db->query("SELECT * FROM users WHERE UserID=$UserID");
            while ($donnees2= $requete2->fetch()){
                echo '<div class="message">';
                echo 'Le '.$donnees['Date'].', de '.$donnees2['FirstName'].' '.$donnees2['LastName'].' [ <i>'.$donnees2['Mail'].'</i> ]<br/>';
                echo '<ins>Objet :</ins> <b>'.$donnees['Objet'].'</b><br/>';
                echo '<ins>Message :</ins> '.$donnees['Demande'];
                echo '</div>';
            }
        }
        ?>
    </div>
</div>

</body>
</html>
