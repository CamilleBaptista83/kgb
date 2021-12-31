<?php

require  "models/getAdmin.php";
require  "models/getAgents.php";

$admin = getAdmin();
$agent = getAgents();


require  "pages/home.php";