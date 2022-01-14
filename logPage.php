<?php
session_start();

require  "./components/header.php";
require  "./components/loadClasses.php";

if (isset($_SESSION['login'])) {
    echo '<script>window.location.href="/kgb/admin.php"</script>';
} else {
    $login = false;

    $manager = new AdminManager();


    if ($_POST) {
        $manager->login($_POST['email'], $_POST['password']);
    }

require  $_SERVER['DOCUMENT_ROOT'] . "/kgb/vue/affichage_log.php";

}



require  './components/footer.php';
?>