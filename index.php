<?php
namespace App;
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

require './Controller/indexController.php';

use Controller\indexController;

switch ($_SERVER)
{
    case $_SERVER['REQUEST_METHOD'] === 'GET':
        $indexController = new indexController();
        $respond = json_encode($indexController->queryHandler('GET'));
        //$getController = new RequestGetController();
        //$respond = json_encode($getController->read());

        if($respond==='false')
        {
            http_response_code(404);
            header('X-PHP-Response-Code: 404', true, 404);
            echo json_encode($_GET['entity'].' was not found.');
            return 1;
        }
        http_response_code(200);
        echo $respond;

        break;
    case $_SERVER['REQUEST_METHOD'] == 'POST':
        $indexController = new indexController();
        $respond = json_encode($indexController->queryHandler('POST'));

        if($respond==='false')
        {
            http_response_code(404);
            header('X-PHP-Response-Code: 400', true, 400);
            echo json_encode('Impossible to insert');
            return 1;
        }
        http_response_code(200);
        echo 'Sucess';
        break;
    case $_SERVER['REQUEST_METHOD'] == 'PUT':
        $indexController = new indexController();
        $respond = json_encode($indexController->queryHandler('PUT'));
        // $getController = new RequestPutController();
        break;
    case $_SERVER['REQUEST_METHOD'] == 'DELETE':
        $indexController = new indexController();
        $respond = json_encode($indexController->queryHandler('DELETE'));
        // $getController = new RequestDelController();
        break;
    default:
        http_response_code(400);
        echo json_encode("BAD REQUEST");
}