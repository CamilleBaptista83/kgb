<?php

require  $_SERVER['DOCUMENT_ROOT']."/kgb/components/loadClasses.php";


$manager = new MissionsManager();
$manager->delete($_GET['id']);

?>

<script>
    window.location.href="../../admin.php"
</script>