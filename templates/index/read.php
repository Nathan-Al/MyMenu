<?php
// Format des données envoyées
header("Content-Type: application/json; charset=UTF-8");

// Durée de vie de la requête
header("Access-Control-Max-Age: 3600");

// Entêtes autorisées
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
?>
<?= $response; ?>