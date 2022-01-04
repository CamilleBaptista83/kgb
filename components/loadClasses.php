<?php

// fonction qui appelle toutes les classes en fonction de leur nom
function loadClasses($class)
{
    if (strpos($class, 'Manager')) {
        require  $_SERVER['DOCUMENT_ROOT']."/kgb/controlers/$class.php";
    } else {
        require  $_SERVER['DOCUMENT_ROOT']."/kgb/models/$class.php";
    }
}

spl_autoload_register('loadClasses');
