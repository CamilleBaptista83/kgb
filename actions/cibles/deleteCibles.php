<?php

require  $_SERVER['DOCUMENT_ROOT']."/kgb/components/loadClasses.php";


$manager = new CiblesManager();
$manager->delete($_GET['id']);

?>