<?php

require  $_SERVER['DOCUMENT_ROOT']."/kgb/components/loadClasses.php";


$manager = new PlanquesManager();
$manager->delete($_GET['id']);

?>
