<?php

require  $_SERVER['DOCUMENT_ROOT']."/kgb/components/loadClasses.php";


$manager = new CiblesManager();
$manager->removeCibleFromMission($_GET['id'], $_GET['id_mission']);
