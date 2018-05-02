<link rel="stylesheet" href="style/gestionmaison.css">

<!-- Nom de la page -->
<?php $nom_page = "Gérer les maisons"; ?>

<!-- Début du contenu de la page -->
<?php ob_start(); ?>
<select>
<?php $db=connexion_BDD();
$id= $_SESSION['id'];
$requete= $db->query("SELECT Name FROM houses WHERE UserID=$id");
    while($donnees= $requete->fetch()){
        echo '<option>'.$donnees['Name'].'</option>';
    }
?>
</select>
<a href='index.php?pageAction=gesmaison&new=maison'><p>Ajouter une maison</p></a><br/><br/>
<a href='index.php?pageAction=gesmaison&new=piece'>Ajouter une pièce</a><br/><br/>
<a href='index.php?pageAction=gesmaison&new=capteur'>Ajouter un capteur</a><br/><br/>
<a href='index.php?pageAction=gesmaison&new=actionneur'>Ajouter un actionneur</a><br/><br/>

<!-- Fin & Affectation du contenu de la page -->
<?php $contenu=ob_get_clean(); ?>

<!-- A ajouter dans le template de la page -->
<?php require 'v_template.php'; ?>