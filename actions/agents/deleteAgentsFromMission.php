<?php

require  $_SERVER['DOCUMENT_ROOT']."/loadClasses.php";


$manager = new AgentsManager();
$manager->removeAgentFromMission($_GET['id'], $_GET['id_mission']);
