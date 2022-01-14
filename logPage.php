<?php
session_start();

include  "./components/header.php";
include  $_SERVER['DOCUMENT_ROOT'] . "/components/loadClasses.php";

if (isset($_SESSION['login'])) {
    echo '<script>window.location.href="/kgb/admin.php"</script>';
} else {
    $login = false;

    $manager = new AdminManager();


    if ($_POST) {
        $manager->login($_POST['email'], $_POST['password']);
    }

include  $_SERVER['DOCUMENT_ROOT'] . "/vue/affichage_log.php";

}



include  'footer.php';
?>