<?php

require  "./loadClasses.php";



$manager = new AgentsManager();
$manager->removeAgentFromMission($_GET['id'], $_GET['id_mission']);
