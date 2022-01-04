<?php

require  $_SERVER['DOCUMENT_ROOT']."/kgb/components/loadClasses.php";


$manager = new ContactsManager();
$manager->delete($_GET['id']);

?>

<script>
    window.location.href="<?php echo $_SERVER['DOCUMENT_ROOT'].'/kgb/index.php'; ?>"
</script>