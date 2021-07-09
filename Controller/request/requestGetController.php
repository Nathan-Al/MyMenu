<?php

namespace Controller;

use Controller\ProduitController as Produit;
use Controller\EntrepriseController as Entreprise;

/**
 * Controller to handle the Get protocol
 */
class RequestGetController
{
    public $element;
    public $request;
    private $databse;
    private $_tabDatas;

    /**
     * GetController construct
     * 
     * @param request $request Requete envoyer par le serveur
     */
    public function __construct($request,$databse) 
    {
        $this->request = $request;
        if(isset($request['element']))
            $this->element = $request['element'];
        else
            $this->element = null;
            $this->databse = $databse;
    }
    /**
     * Function to read information
     * 
     * @return JSON
     */
    function read()
    {

        if(isset($this->request['element']))
        {
            if (gettype($this->request["element"])=="string" 
            && strlen($this->request["element"])<100 
        )   {
                $name = '"'.$this->request["element"].'"';
                $action = 'read';
            } else {
                http_response_code(400);
                echo json_encode("Limite de charactère dépassé");
            }
        } else {
            $action = 'readall';
            $name = '';
        }

        $entity = $this->request['entity'];

        $databse = $this->databse;

        switch ($entity)
        {
            case $entity === 'entreprise':
                $entreprise = new Entreprise();
                $this->_tabDatas = $entreprise->traitement($name,$action,$databse);
                break;
            case $entity === 'produit':
                $produit = new Produit();
                $this->_tabDatas = $produit->traitement($name,$action,$databse);
                break;
            default:
                $this->_tabDatas = null;
        }

        if (!empty($this->_tabDatas)) {
            return $this->_tabDatas;
        } else {
            return false;
        }

    }
}

