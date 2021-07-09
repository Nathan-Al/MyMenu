<?php

namespace Controller;

use Controller\EntrepriseController as Entreprise;
use Controller\ProduitController as Produit;

class RequestPostController
{
    public $element;
    public $request;
    private $database;
    private $_tabDatas;

    /**
     * GetController construct
     * 
     * @param request $request Requete envoyer par le serveur
     */
    public function __construct($request,$database) 
    {
        $this->request = $request;
        if(isset($request['element']))
            $this->element = $request['element'];
        else
            $this->element = null;
        $this->database = $database;
    }

    function insert()
    {
        $entity = $_REQUEST['entity'];

        $database = $this->database;

        $data = json_decode(file_get_contents('php://input'));

        switch ($entity)
        {
            case $entity === 'entreprise':
                $entreprise = new Entreprise();
                return $this->_tabDatas = $entreprise->traitement($data,'insert',$database);
                break;
            case $entity === 'produit':
                $produit = new Produit();
                return $this->_tabDatas = $produit->traitement($data,'insert',$database);
                break;
            default:
                $this->_tabDatas = null;
        }
    }
}