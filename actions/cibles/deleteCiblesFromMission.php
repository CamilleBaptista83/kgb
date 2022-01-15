<?php

require  "../../loadClasses.php";


$manager = new CiblesManager();
$manager->removeCibleFromMission($_GET['id'], $_GET['id_mission']);
