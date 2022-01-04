<?php

// fonction qui appelle toutes les classes en fonction de leur nom
function loadClasses($class)
{
    if (strpos($class, 'Manager')) {
        require "../kgb/controlers/$class.php";
    } else {
        require "../kgb/models/$class.php";
    }
}

spl_autoload_register('loadClasses');
