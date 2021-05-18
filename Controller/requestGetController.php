<?php

namespace Controller;

class requestGetController
{
    public $element;
    public $request;

    public function __construct($request, $element) {
        $this->request = $request;
        $this->element = $element;
    }

    function read()
    {
        if(gettype($this->request["element"])=="string" && strlen($this->request["element"])<100)
            {
                $name = '"'.$this->request["element"].'"';
                $tab_entreprise = Traitement($name);
                $page = $request['page'];

                switch ($page)
                {
                    case $page === 'entreprise':
                }
                    
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


            else if($this->request["page"]=="produit")
            {
                require_once "../controller/produit.php";
                if($this->request["action"]=="read")
                {
                    $name = $this->request["element"];
                    $produit_array = Traitement($name,$this->request["action"]);
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
                if($this->request["action"]=="readall")
                {
                    $id = (int)$this->request["element"];
                    $produit_array = Traitement($id,$this->request["action"]);
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
            if($this->request["page"]=="t" && $this->request["action"]=="read" && isset($this->request["element"]))
            {
                http_response_code(200);
                echo json_encode("TEST OK".$this->request["element"]);
            }*/

}

