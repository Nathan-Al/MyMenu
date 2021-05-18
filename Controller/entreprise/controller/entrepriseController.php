<?php

namespace Controller;

use Model\ClassModel\Entreprise;
use Model\ManagerModel\ManagerEntreprise;
use Tools\connexionPDO;

class entrepriseController extends Entreprise
{
    public $pdo = new connexionPDO();
    function Traitement($name)
    {
        // La bonne méthode est utilisée
        require_once "../model/manager/man-entreprise.php";
        
        $database = $pdo->connexionPDO();
                $Mn_categorie = New ManagerEntreprise($database);
                $entreprise = $Mn_categorie->getSelect($name);
                //Verififcations que le retour ne sois pas vide
                if(gettype($entreprise)=="object")
                {
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
                }else
                {
                    return false;
                }
    }
}
