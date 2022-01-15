<?php
session_start();

include  "header.php";
include  "loadClasses.php";

if (isset($_SESSION['login'])) {
    echo '<script>window.location.href="admin.php"</script>';
} else {
    $login = false;

    $manager = new AdminManager();


    if ($_POST) {
        $manager->login($_POST['email'], $_POST['password']);
    }

include  "vue/affichage_log.php";

}

include  'footer.php';
?>