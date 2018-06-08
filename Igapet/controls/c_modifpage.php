<?php

include("c_config.php");
include('../models/m_modifpage.php');

ajouter_page($db);
header ('Location: http://localhost/igapet/index.php?pageAction=v_admin_edition');
?>