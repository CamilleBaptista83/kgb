<?php

require  "./components/loadClasses.php";


$manager = new AgentsManager();
$manager->delete($_GET['id']);

?>

<script>
    window.location.href="../kgb/index.php"
</script>