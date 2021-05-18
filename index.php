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

use Controller\requestGetController;
use Controller\RequestPostController;
use Controller\requestDelController;
use Controller\requestPutController;

if(isset($_GET["page"]))
{
    if(isset($_GET["action"]))
    {
        switch ($_SERVER)
        {
            case $_SERVER['REQUEST_METHOD'] === 'GET':
                $getController = new requestGetController($_GET,$_GET["element"]);
            case $_SERVER['REQUEST_METHOD'] == 'POST':
                $getController = new requestPostController();
            case $_SERVER['REQUEST_METHOD'] == 'PUT':
                $getController = new requestPutController();
            case $_SERVER['REQUEST_METHOD'] == 'DELETE':
                $getController = new requestDelController();

            default:
                http_response_code(400);
                echo json_encode("BAD REQUEST");
        }
    }
}

http_response_code(403);
echo json_encode(["message" => "La méthode n'est pas autorisée"]);

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    //echo "Debug : ".$_GET["page"].$_GET["action"].$_GET["element"];
    if(isset($_GET["page"]))
    {
        if(isset($_GET["action"]))
        {
            if($_GET["page"]=="entreprise")
            {
                require_once "../controller/entreprise.php";
                if($_GET["action"]=="read")
                {
                    if(gettype($_GET["element"])=="string" && strlen($_GET["element"])<100)
                    {
                        $name = '"'.$_GET["element"].'"';
                        $tab_entreprise = Traitement($name);
                        if(gettype($tab_entreprise)=="array")
                        {
                            http_response_code(200);
                            echo json_encode($tab_entreprise);
                        }else
                        {
                            http_response_code(404);
                            echo json_encode("Entreprise read :Impossible de récupérer les informations");
                        }
                    }else
                    {
                        http_response_code(404);
                        echo json_encode("Limite de charactère dépassé ?");
                    }
                }
            }
            else if($_GET["page"]=="produit")
            {
                require_once "../controller/produit.php";
                if($_GET["action"]=="read")
                {
                    $name = $_GET["element"];
                    $produit_array = Traitement($name,$_GET["action"]);
                    //echo gettype($produit_array);
                    if(gettype($produit_array )=="array")
                    {
                        http_response_code(200);
                        echo json_encode($produit_array);
                    }else
                    {
                        http_response_code(404);
                        echo json_encode("Produit read : Impossible de récupérer les informations");
                    }
                }
                if($_GET["action"]=="readall")
                {
                    $id = (int)$_GET["element"];
                    $produit_array = Traitement($id,$_GET["action"]);
                    //echo gettype($produit_array);
                    if(gettype($produit_array )=="array")
                    {
                        http_response_code(200);
                        echo json_encode($produit_array);
                    }else
                    {
                        http_response_code(404);
                        echo json_encode("Produit read : Impossible de récupérer les informations");
                    }
                }
            }
            /*
            if($_GET["page"]=="t" && $_GET["action"]=="read" && isset($_GET["element"]))
            {
                http_response_code(200);
                echo json_encode("TEST OK".$_GET["element"]);
            }*/
        }
    }
    else
    {
        http_response_code(404);
        echo json_encode("Désoler vous vouliez quelque chose ?");
    }
}else if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_GET["page"]))
    {
        if(isset($_GET["action"]))
        {
            if($_GET["page"]=="entreprise")
            {
                if($_GET["action"]=="insert")
                {
                    if(isset($_POST["data"]))
                    {
                        
                    }
                }
            }
            else if($_GET["page"]=="produit")
            {
                require_once "../controller/produit.php";
                if($_GET["action"]=="insert")
                {
                    if(isset($_POST["data"]))
                    {
                        //[{"key":"data","value":"{name:\"pate\",composant:\"pate,sel\",prix:10,1}","description":"","type":"text","enabled":true}]
                        if(isset($_POST["data"]))
                        {
                            $data = $_POST["data"];
                            if($rep = Traitement($data,$_GET["action"]))
                            {
                                http_response_code(200);
                                echo json_encode("Insert : ".$rep);
                            }else
                            {
                                http_response_code(500);
                                echo json_encode("Insert : ".$rep);
                            }  
                        }
                    }
                }

            }
            else if($_GET["page"]=="compte")
            {
                if($_GET["action"]=="insert")
                {
                    if(isset($_POST["data"]))
                    {
                        
                    }
                }
            }
        }
    }
    // Mauvaise méthode, on gère l'erreur
    /*
    http_response_code(405);
    echo json_encode(["message" => "La méthode POST n'est pas autorisée"]);
    */
}
else if($_SERVER['REQUEST_METHOD'] == 'PUT')
{
    if(isset($_GET["page"]))
    {
        if(isset($_GET["action"]))
        {
            if($_GET["page"]=="entreprise")
            {
                if($_GET["action"]=="update")
                {
                    if(isset($_POST["data"]))
                    {
                        
                    }
                }
            }
            else if($_GET["page"]=="produit")
            {
                require_once "../controller/produit.php";
                if($_GET["action"]=="update")
                {
                    if(isset($_POST["data"]))
                    {
                        
                    }
                }
            }
            else if($_GET["page"]=="compte")
            {
                if($_GET["action"]=="update")
                {
                    if(isset($_POST["data"]))
                    {
                        if($_GET["action"]=="delete")
                        {
                            if(isset($_POST["data"]))
                            {
                                
                            }
                        }
                    }
                }
            }

        }

    }
}
else if($_SERVER['REQUEST_METHOD'] == 'DELETE')
{
    if(isset($_GET["page"]))
    {
        if(isset($_GET["action"]))
        {
            if($_GET["page"]=="produit")
            {
                if($_GET["action"]=="delete")
                {
                    if(isset($_POST["data"]))
                    {
                        $data = $_POST["data"];
                            if($rep = Traitement($data,$_GET["action"])===true)
                            {
                                http_response_code(200);
                                echo json_encode("index reussie : ".$rep);
                            }else
                            {
                                http_response_code(500);
                                echo json_encode("index echec: ".$rep);
                            }
                    }
                }
            }
            if($_GET["page"]=="entreprise")
            {
                if($_GET["action"]=="delete")
                {
                    if(isset($_POST["data"]))
                    {
                        
                    }
                }
            }
        }
    }
    
}
else{
    // Mauvaise méthode, on gère l'erreur
    http_response_code(403);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}