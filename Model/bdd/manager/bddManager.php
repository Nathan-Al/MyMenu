<?php

namespace Model\ManagerModel;

require './Model/bdd/connexion.php';
use Model\connexionPDO;

class ManagerBdd
{
    private $_pdo;

    function createConnexion()
    {
        $this->_pdo = new connexionPDO();
        $database = $this->_pdo->connexionPDO();

        return $database;
    }

    function destroyConnexion()
    {
        $this->_pdo = new connexionPDO();
        $this->_pdo->deconnexionPDO();
    }
}