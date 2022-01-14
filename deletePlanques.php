<?php

require  "./loadClasses.php";



$manager = new PlanquesManager();
$manager->delete($_GET['id']);

?>
