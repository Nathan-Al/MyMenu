<?php

namespace Model\ManagerModel;

use Model\ClassModel\Entreprise;

class ManagerEntreprise
{
    private $connexion;
    public $entreprise;
    public $id;

    public function __construct($db){
        $this->connexion = $db;
    }

    public function getAll()
    {
        $requette = "select * FROM `entreprise`;";
        $reponse  = $this->connexion->prepare($requette);
        $reponse->execute();

        $entreprise = array();

        while ($donnees = $reponse->fetch())
        {
            $entreprise[] = new Entreprise(
                $donnees["id_entre"],
                $donnees["nom_entre"],
                $donnees["horaire_entre"],
                $donnees["localisation_entre"],
                $donnees["gpsX_entre"],
                $donnees["gpsY_entre"],
                $donnees["siren"]
            );
        }

        $requette = null;
        $reponse = null;

        return $entreprise;
    }

    /**
     * @param String
     * @return Array
     */
    public function getSelect($id)
    {
        $requette = "select * FROM `entreprise` WHERE id_entre=".$id.";";
        $reponse  = $this->connexion->prepare($requette);
        $reponse->execute();
        
        if($reponse->rowCount() > 0)
        {
            while ($donnees = $reponse->fetch())
            {
                $entreprise = new Entreprise(
                    $donnees["id_entre"],
                    $donnees["nom_entre"],
                    $donnees["horaire_entre"],
                    $donnees["localisation_entre"],
                    $donnees["gpsX_entre"],
                    $donnees["gpsY_entre"],
                    $donnees["siren"]
                );
            }
        }else
        {
            $entreprise = false;
        }

        $requette = null;
        $reponse = null;

        return $entreprise;
    }

    /**
     * @param Entreprise Object
     * @return boolean
     */
    public function update($data)
    {
        $requette = "UPDATE `entreprise` SET 
        `id_entre`=[value-1],
        `nom_entre`=[value-2],
        `horaire_entre`=[value-3],
        `localisation_entre`=[value-4],
        `gpsX_entre`=[value-5],
        `gpsY_entre`=[value-6],
        `siren`=[value-7];";
        $reponse  = $this->connexion->prepare($requette);
        if($reponse->execute())
            return true;
        else
            return false;
    }

    /**
     * @param Entreprise Object
     * @return boolean
     */
    public function insert($entreprise)
    {
        $requette = "INSERT INTO `entreprise`(`nom_entre`, `horaire_entre`, `localisation_entre`, 
        `gpsX_entre`, `gpsY_entre`, `siren`) 
        VALUES (
            '".$entreprise->getNom()."',
            '".$entreprise->getHoraire()."',
            '".$entreprise->getLocalisation()."',
            '".$entreprise->getGpsX()."',
            '".$entreprise->getGpsY()."',
            '".$entreprise->getSiren()."')";
        $reponse  = $this->connexion->prepare($requette);
        if($reponse->execute())
            return true;
        else
            return false;
    }

    /**
     * @param Int id
     * @return boolean
     */
    public function delete($id)
    {
        $requette = "DELETE FROM `entreprise` WHERE $id";
        $reponse  = $this->connexion->prepare($requette);
        if($reponse->execute())
            return true;
        else
            return false;
    }
}
?>