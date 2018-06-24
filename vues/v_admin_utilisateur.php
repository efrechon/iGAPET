<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/admin_utilisateur.css"/>
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
        <h3>Liste utilisateurs</h3>
        <table>
            <tr>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Mail</th>
                <th>Nombre connexion</th>
                <th>Dernière connexion</th>
            </tr>
            <?php
            if(isset($_GET['supprime']) AND !empty($_GET['supprime'])){
                $id= (int) $_GET['supprime'];
				if (getSQL($db,"SELECT UserTypeID FROM users WHERE UserID=".$id)[0]['UserTypeID'] >-1 )
				{
                $req= $db->prepare("DELETE FROM users WHERE UserID=:id");
                $req->bindParam(':id', $id);
                $req->execute();
				}
            }
            ?>
            <?php
            $req= $db->query("SELECT UserID, FirstName, LastName, Mail, NbrConnexion, ConnectDate FROM users WHERE UserTypeID!=-2 ORDER BY NbrConnexion DESC");
            while($u= $req->fetch()){
                echo '<tr><td>'.$u['FirstName'].'</td>';
                echo '<td>'.$u['LastName'].'</td>';
                echo '<td>'.$u['Mail'].'</td>';
                echo '<td>'.$u['NbrConnexion'].'</td>';
                echo '<td>'.$u['ConnectDate'].'</td>';
                echo '<td><a onclick="return confirm(\'Etes vous sur de vouloir supprimer cet utilisateur? (action irréversible)?\');" href="index.php?pageAction=v_admin_utilisateur&supprime='.$u['UserID'].'">Supprimer</a></td></tr>';
            }
            ?>
        </table>
    </div>
    <div class="newadministrateur">
        <h3>Ajouter un administrateur</h3>
        <form action="controls/c_admin.php" method="post">
            <label for="FirstName">Prénom : </label><input type="text" name="FirstName"><br/><br/>
            <label for="LastName">Nom : </label><input type="text" name="LastName"><br/><br/>
            <label for="Mail">Mail : </label><input type="email" name="Mail"><br/><br/>
            <label for="UserPassword">Mot de Passe : </label><input type="password" name="UserPassword"><br/><br/>
            <label for="UserPassword2">Confirmer Mot de Passe : </label><input type="password" name="UserPassword2"><br/><br/>
            <label for="Phone">Numéro de téléphone : </label><input type="text" name="Phone"><br/><br/>
            <input type="hidden" value="administrateur" name="type">
            <input type="submit" value="Ajouter"><br/><br/>
        </form>
    </div>
    <div class="administrateur">
        <h3>Liste administrateurs</h3>
        <table>
            <tr>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Mail</th>
                <th>Nombre connexion</th>
                <th>Dernière connexion</th>
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
            $req= $db->query("SELECT UserID, FirstName, LastName, Mail, NbrConnexion, ConnectDate FROM users WHERE UserTypeID=-2 OR USerTypeID=-1");
            while($u= $req->fetch()){
                echo '<tr><td>'.$u['FirstName'].'</td>';
                echo '<td>'.$u['LastName'].'</td>';
                echo '<td>'.$u['Mail'].'</td>';
                echo '<td>'.$u['NbrConnexion'].'</td>';
                echo '<td>'.$u['ConnectDate'].'</td>';
                echo '<td><a onclick="return confirm(\'Etes vous sur de vouloir supprimer cet administrateur? (action irréversible)?\');" href="index.php?pageAction=v_admin_utilisateur&supprime='.$u['UserID'].'">Supprimer</a></td></tr>';
            }
            ?>
        </table>
    </div>
</div>

</body>
</html>