<?php
ajouter_scenario($db);
include("c_config.php");
include("../models/m_scenarios.php");
header ('Location: http://localhost/Igapet/index.php?pageAction=v_scenarios');
?>