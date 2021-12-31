<?php

function getAgents()

{
    try {
        $kgb_bdd = new PDO('mysql:host=localhost;dbname=kgb;charset=utf8', 'kgb_admin', 'vladimirovitch');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    
    $agent = $kgb_bdd->query('SELECT * FROM dt_agents LEFT JOIN dt_countries ON dt_agents.id_country = dt_countries.id');

    return $agent;
}
