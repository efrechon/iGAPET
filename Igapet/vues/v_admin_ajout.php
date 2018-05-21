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
<div id="full">
    <div class="composants">
        <table>
            <h4>Capteurs</h4>
            <tr>
                <th>Nom</th>
                <th>Unité</th>
                <th>Nombre</th>
                <th>Panne détécté</th>
            </tr>
        <h3>Catalogue des composants</h3>
            <?php
            if(isset($_GET['supprimeC']) AND !empty($_GET['supprimeC'])){
                $id= (int)$_GET['supprimeC'];
                $req= $db->prepare("DELETE FROM captortypes WHERE CaptorTypeID=:id");
                $req->bindParam(':id', $id);
                $req->execute();
            }
            ?>
            <?php
            $reqC=$db->query("SELECT CaptorTypeID, CaptorName, Unit FROM captortypes");
            while($c=$reqC->fetch()){
                $id=$c['CaptorTypeID'];
                echo '<tr><td>'.$c['CaptorName'].'</td><td>'.$c['Unit'].'</td>';
                $reqC2=$db->query("SELECT COUNT(*) as nbr FROM captors WHERE CaptorTypeID=$id");
                while($c2=$reqC2->fetch()){
                    echo '<td>'.$c2['nbr'].'</td>';
                }
                echo '<td>0</td>';
                echo '<td><a href="index.php?pageAction=admini&modification=catalogue&supprimeC='.$c['CaptorTypeID'].'">Supprimer</a></td></tr>';
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
                echo '<td>0</td>';
                echo '</tr>';
            }
            ?>
        </table>
    </div>
    <div class="newcomposants">
        <h3>Ajouter un capteur</h3>
        <form method="post" action="">
            <input type="radio" name="typeNT" value="captor">Capteur
            <input type="radio" name="typeNT" value="actuator">Actionneur<br/><br/>
            <label for="nameNT">Nom composant : </label><input type="text" name="nameNT"><br/><br/>
            <label for="uniteNT">Unité : </label><input type="text" name="uniteNT"><br/><br/>
            <label for="minNA">Minimum : </label><input type="radio" name="OFFNUMBER"><input type="number" name="minNA">
            <input type="radio" name="OFFNUMBER">OFF<br/><br/>
            <label for="maxNA">Minimum : </label><input type="radio" name="ONNUMBER"><input type="number" name="maxNA">
            <input type="radio" name="ONNUMBER">ON<br/><br/>
            <input type="submit" value="Ajouter"><br/><br/>
        </form>
    </div>
   </div>

</body>
</html>
