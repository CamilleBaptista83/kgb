<?php

require  "./loadClasses.php";



$manager = new CiblesManager();
$manager->delete($_GET['id']);

?>