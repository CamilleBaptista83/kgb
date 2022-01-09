<?php
session_start();

if(isset($_SESSION['last_name'])){

    require  $_SERVER['DOCUMENT_ROOT'] . "/kgb/components/header.php";
require  $_SERVER['DOCUMENT_ROOT'] . "/kgb/components/loadClasses.php";

echo 'Bienvenue Agent ' . $_SESSION['last_name'];
?>

<div class="container">
    
</div>


<?php
require  $_SERVER['DOCUMENT_ROOT'] . '/kgb/components/footer.php';

}
?>
