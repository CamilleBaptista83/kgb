<?php

require  "./loadClasses.php";



$manager = new PlanquesManager();
$manager->removePlanquesFromMission($_GET['id'], $_GET['id_mission']);
