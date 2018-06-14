<?php
include("c_config.php");
include('../models/m_profil.php');

if(isset($_POST['FirstName'], $_POST['LastName'], $_POST['Phone'])){
    changement_profil($db);
    header('Location:../index.php?pageAction=v_profil');
}


?>

