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
    if(isset($_GET["name_ent"]))
    {
        if(gettype($_GET["name_ent"])=="string" && strlen($_GET["name_ent"])<100)
        {
            require_once "../controller/entreprise.php";
            $name = '"'.$_GET["name_ent"].'"';
            $tab_entreprise = Traitement($name);
            if(gettype($tab_entreprise)=="array")
            {
                http_response_code(200);
                echo json_encode($tab_entreprise);
            }else
            {
                http_response_code(404);
                echo json_encode("Impossible de récupérer les informations");
            }
        }else
        {
            http_response_code(404);
            echo json_encode("Limite de charactère dépassé ?");
        }
    }
}else if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_POST["update"]))
    {
        if(gettype($_POST["update"])=="int" && strlen($_GET["name_ent"])<100)
        {
            
        }
    }
}
else{
    // Mauvaise méthode, on gère l'erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}