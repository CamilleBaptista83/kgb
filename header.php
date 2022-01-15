<!DOCTYPE html>
<html lang="fr">


<?php 
$img_src = $_SERVER['DOCUMENT_ROOT'] . "/img/logo_KGB.png" ;
$jquery_src = $_SERVER['DOCUMENT_ROOT'] . "/node_modules/jquery/dist/jquery.min.js";
$bootstrap_src = $_SERVER['DOCUMENT_ROOT'] . "/node_modules/bootstrap/dist/css/bootstrap.css";
$logPage_src = $_SERVER['DOCUMENT_ROOT'] . "/logPage.php";
$index_src = $_SERVER['DOCUMENT_ROOT'] . "/index.php";
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Import Bootstrap.css -->
    <link rel="stylesheet" type="text/css" href="<?php $bootstrap_src ?>">

    <!-- Import Logos -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!-- Import Style.css -->
    <link rel="stylesheet" type="text/css" href="./style.css">

    <script src="<?php $jquery_src ?>"></script>

    <title>KGB</title>

    <meta name="description" content="Liste des missions du KGB -- Russie">
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#"><img class="logo" src="<?php $img_src ?>" /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="container">
                        <ul class="nav justify-content-end">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="<?php $index_src ?>">Acceuil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php $logPage_src ?>">Admin</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>