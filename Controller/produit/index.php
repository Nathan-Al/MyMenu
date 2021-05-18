<?php
// Headers requis
// Accès depuis n'importe quel site ou appareil (*)
header("Access-Control-Allow-Origin: *");

// Format des données envoyées
header("Content-Type: application/json; charset=UTF-8");

// Méthode autorisée
header("Access-Control-Allow-Methods: GET");

// Durée de vie de la requête
header("Access-Control-Max-Age: 3600");

// Entêtes autorisées
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if($_SERVER['REQUEST_METHOD'] == 'GET'){

    if(isset($_GET["produit_sec_id"]))
    {
        // La bonne méthode est utilisée
        require_once "../controller/produit.php";
        $produit_array = Traitement($_GET["produit_sec_id"]);
        if(gettype($produit_array )=="array")
        {
            http_response_code(200);
            echo json_encode($produit_array);
        }else
        {
            http_response_code(404);
            echo json_encode("Impossible de récupérer les informations");
        }
    }
    else
    {
        http_response_code(404);
        echo json_encode("Désoler vous vouliez quelque chose ?");
    }
}else if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    // Mauvaise méthode, on gère l'erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode POST n'est pas autorisée"]);
}
else{
    // Mauvaise méthode, on gère l'erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}