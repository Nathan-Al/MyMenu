<?php

namespace Controller;

require './Model/entreprise/manager/entrepriseManager.php';
//require './Model/connexion.php';

use Model\ClassModel\Entreprise;
use Model\ManagerModel\ManagerEntreprise;
//use Model\connexionPDO;

/**
 * Entreprise Handle Datas
 */
class EntrepriseController
{
    /**
     * Datas treatment
     * 
     * @param data $data Entreprise data
     * 
     * @return array|boolean
     */
    function traitement($data,$action,$database)
    {
        $MnEntreprise = New ManagerEntreprise($database);
        if($action === 'read')
            $entreprise = $MnEntreprise->getSelect($data);
        else if ($action === 'readall')
            $entreprise = $MnEntreprise->getAll($data);
        else if($action === 'insert')
        {
            $result = [];
            foreach ($data->data as $key => $value) {
                $produit = new Entreprise(
                    0,
                    $value->name,
                    $value->horaire,
                    $value->localisation,
                    $value->gpsX,$value->gpsY,
                    $value->siren
                );
                $result[] = $MnEntreprise->insert($produit);
            }
            $i = 0;
            $t = 0;
            while ($i < sizeof($result))
            {
                if($result[$i]===true)
                {
                    $t++;
                }
                $i++;
            }

            if($t === sizeof($result))
                return $result;
            else 
                return false;
        }

        return $entreprise;
    }
}
