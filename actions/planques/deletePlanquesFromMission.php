<?php

require  $_SERVER['DOCUMENT_ROOT']."/kgb/components/loadClasses.php";


$manager = new PlanquesManager();
$manager->removePlanquesFromMission($_GET['id'], $_GET['id_mission']);
