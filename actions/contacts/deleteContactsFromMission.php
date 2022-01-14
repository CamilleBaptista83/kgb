<?php

require  $_SERVER['DOCUMENT_ROOT']."/kgb/components/loadClasses.php";


$manager = new ContactsManager();
$manager->removeContactsFromMission($_GET['id'], $_GET['id_mission']);
