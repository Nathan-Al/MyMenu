<?php

namespace Controller;

use Model\ClassModel\Entreprise;
use Model\ManagerModel\ManagerEntreprise;
use Tools\connexionPDO;

/**
 * Entreprise Handle Datas
 */
class EntrepriseController extends Entreprise
{
    private $_pdo;

    /**
     * Datas treatment
     * 
     * @param name $name Entreprise name
     * 
     * @return array|boolean
     */
    function traitement($name)
    {
        $this->_pdo = new connexionPDO();
        $database = $this->_pdo->connexionPDO();

        $MnCategorie = New ManagerEntreprise($database);
        $entreprise = $MnCategorie->getSelect($name);

        //Verififcations que le retour ne sois pas vide
        if (gettype($entreprise)=="object") {
            $tab_entreprise = [
                "id"=>$entreprise->getId(),
                "nom"=>$entreprise->getNom(),
                "horaire"=>$entreprise->getHoraire(),
                "localisation"=>$entreprise->getLocalisation(),
                "gpsX"=>$entreprise->getGpsX(),
                "gpsY"=>$entreprise->getGpsY(),
                "siren"=>$entreprise->getSiren(),
                "link"=>["update"=>"liens/update/id"]
            ];
            return $tab_entreprise;
        } else {
            return false;
        }
    }
}
