<?php

require  $_SERVER['DOCUMENT_ROOT']."/loadClasses.php";


$manager = new AgentsManager();
$manager->delete($_GET['id']);
