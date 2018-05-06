<?php

function recup_liste_maison($db){
    $id= $_SESSION['id'];
    $requete= $db->query("SELECT Name, HouseID FROM houses WHERE UserID=$id");
    while($donnees= $requete->fetch()){
        $nomM= $donnees['Name'];
        $idhome= $donnees['HouseID'];
        echo ('<option value='."$idhome".'>'.$nomM.'</option>');
    }
}

?>