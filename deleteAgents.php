<?php

// creation d'un nouvel obj
$manager = new AgentsManager();
// appel de la fonction get all pour récupérer les données
$agents = $manager->getById($_GET("id"));

$manager->delete($_GET("id"));
?>

<script>
    window.location.href="../kgb/index.php"
</script>