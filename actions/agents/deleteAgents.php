<?php

require  "../../loadClasses.php";


$manager = new AgentsManager();
$manager->delete($_GET['id']);
