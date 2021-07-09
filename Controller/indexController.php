<?php

namespace Controller;

require './Model/bdd/manager/bddManager.php';
require './Controller/request/requestGetController.php';
require './Controller/request/requestPostController.php';
require './Controller/request/requestPutController.php';
require './Controller/request/requestDelController.php';

require './Controller/entreprise/entrepriseController.php';
require './Controller/produit/produitController.php';
require './Controller/compte/compteController.php';

require './Model/produit/class/produitClass.php';
require "./Model/entreprise/class/entrepriseClass.php"; 

use Model\ManagerModel\ManagerBdd;
use Controller\RequestGetController;
use Controller\RequestPostController;
use Controller\RequestDelController;
use Controller\RequestPutController;

use Controller\CompteController as Compte;


class indexController
{
    private $element;
    private $request;
    private $databse;
    private $requestController;

    /**
     * GetController construct
     */
    public function __construct() 
    {

    }

    function queryHandler($method)
    {
        $this->databse = $this->bddCo();

        switch ($method)
        {
            case $method === 'GET':
                $requestController = new RequestGetController($_GET,$this->databse);
                return $requestController->read();
                break;
            case $method === 'POST':
                $requestController = new RequestPostController($_POST,$this->databse);
                return $requestController->insert();
                break;
            case $method === 'PUT':
                $requestController = new RequestPutController();
                return $requestController;
                break;
            case $method === 'DELETE':
                $requestController = new RequestDelController();
                return $requestController;
                break;
        }
    }

    function bddCo()
    {
        $bddMn = new ManagerBdd();
        return $bddMn->createConnexion();
    }

    function bddDeco()
    {
        $bddMn = new ManagerBdd();
        $bddMn->destroyConnexion();
    }

}