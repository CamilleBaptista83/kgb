<?php

require  "../../loadClasses.php";

$manager = new ContactsManager();
$manager->delete($_GET['id']);

?>
