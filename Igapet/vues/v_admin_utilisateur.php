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
    <?php include ('v_admin_menu.php');?>
</div>
<div id="full">
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
            if(isset($_GET['supprime']) AND !empty($_GET['supprime'])){
                $id= (int) $_GET['supprime'];
                $req= $db->prepare("DELETE FROM users WHERE UserID=:id");
                $req->bindParam(':id', $id);
                $req->execute();
            }
            ?>
            <?php
            $req= $db->query("SELECT UserID, FirstName, LastName, Mail, NbrConnexion FROM users WHERE UserTypeID!=1 ORDER BY NbrConnexion DESC");
            while($u= $req->fetch()){
                echo '<tr><td>'.$u['FirstName'].'</td>';
                echo '<td>'.$u['LastName'].'</td>';
                echo '<td>'.$u['Mail'].'</td>';
                echo '<td>'.$u['NbrConnexion'].'</td>';
                echo '<td><a href="index.php?pageAction=v_admin_accueil&supprime='.$u['UserID'].'">Supprimer</a></td></tr>';
            }
            ?>
        </table>
    </div>
</div>

</body>
</html>