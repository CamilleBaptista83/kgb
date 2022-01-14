<?php

// fonction qui appelle toutes les classes en fonction de leur nom
function loadClasses($class)
{
    if (strpos($class, 'Manager')) {
        require  "./controlers/$class.php";
    } else {
        require  "./models/$class.php";
    }
}

spl_autoload_register('loadClasses');
