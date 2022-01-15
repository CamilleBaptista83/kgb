<?php

require  "../../loadClasses.php";

$manager = new ContactsManager();
$manager->removeContactsFromMission($_GET['id'], $_GET['id_mission']);
