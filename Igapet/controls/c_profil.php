<?php
include("c_config.php");
include('../models/m_profil.php');

changement_profil($db);
header('Location:../index.php?pageAction=v_profil');


?>

