<?php

require  "./loadClasses.php";



$manager = new MissionsManager();
$manager->delete($_GET['id']);

?>

<script>
    window.location.href="../../admin.php"
</script>