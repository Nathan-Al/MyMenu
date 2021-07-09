<?php

namespace Model\ManagerModel;

use Model\ClassModel\Produit;

class ManagerProduit
{
    private $connexion;
    public $entreprise;
    public $id;

    public function __construct($db){
        $this->connexion = $db;
    }

    /**
     * Verify that a entry exist in the database
     * 
     * @param string $conditions
     */
    public function AlreadyExist($conditions)
    {
        $requette = "select `id_prod` FROM `produit` WHERE ".$conditions;
        $reponse  = $this->connexion->prepare($requette);
        $reponse->execute();
        $donnees=$reponse->fetch();

        if(gettype($donnees)=="boolean" && $donnees==false)
        {
            return false;
        }
        else if(gettype($donnees)=="array")
        {
            return true;
        }    
    }

    public function getAll()
    {
        $requette = "select * FROM `produit`;";
        $reponse  = $this->connexion->prepare($requette);
        $reponse->execute();

        $categorie = array();

        while ($donnees = $reponse->fetch())
        {
            $categorie[] = new Produit(
                $donnees["id_prod"],
                $donnees["nom_prod"],
                $donnees["composant_prod"],
                $donnees["prix_prod"],
                $donnees["id_entreprise_produit"]);
        }

        $requette = null;
        $reponse = null;

        return $categorie;
    }
    /**
    * @param Nom String
    * @return Produit || Boolean
    */
    public function getSelect($id)
    {
        $requette = "select * FROM `produit` WHERE id_prod=".$id.";";
        $reponse  = $this->connexion->prepare($requette);
        $reponse->execute();
            
        if($reponse->rowCount() > 0)
        {
            while ($donnees = $reponse->fetch())
            {
                $produit = new Produit(
                    $donnees["id_prod"],
                        $donnees["nom_prod"],
                        $donnees["composant_prod"],
                        $donnees["prix_prod"],
                        $donnees["id_entreprise_produit"]
                    );
                }
                
            }else
            {
                $produit = false;
            }

        $requette = null;
        $reponse = null;

        return $produit;
    }

    /**
    * @param Nom String
    * @return Array Object
    */
    public function getSelectIdEnteprise($id)
    {
        $requette = "select * FROM `produit` WHERE id_entreprise_produit=".$id.";";
        $reponse  = $this->connexion->prepare($requette);
        $reponse->execute();
            
        if($reponse->rowCount() > 0)
        {
            while ($donnees = $reponse->fetch())
            {

                $produit[] = new Produit(
                    $donnees["id_prod"],
                        $donnees["nom_prod"],
                        $donnees["composant_prod"],
                        $donnees["prix_prod"],
                        $donnees["id_entreprise_produit"]
                    );
                }
                
            }else
            {
                $produit = false;
            }

        $requette = null;
        $reponse = null;

        return $produit;
    }

    /**
    * @param Produit $produit Class Produit
    * @return boolean
    */
    public function insert($produit)
    {
        $verf = $this->AlreadyExist('`nom_prod` = "'.$produit->getName().'";');

        if(!$verf)
        {
            $requette = "INSERT INTO `produit`(`nom_prod`, `composant_prod`, `prix_prod`, `id_entreprise_produit`) 
            VALUES (
                '".$produit->getName()."',
                '".$produit->getComposant()."',
                ".$produit->getPrice().",
                ".$produit->getIdRelations().")";
            $reponse  = $this->connexion->prepare($requette);
            if($reponse->execute())
                return true;
            else
                return false;
        }else
        {
            return 'Already exist';
        }
    }

    /**
    * @param Produit Object
    * @return boolean
    */
    public function update($produit)
    {
        $requette = "UPDATE `produit` SET 
        `id_prod`=[value-1],
        `nom_prod`=[value-2],
        `composant_prod`=[value-3],
        `prix_prod`=[value-4],
        `id_entreprise_produit`=[value-5]";
        $reponse  = $this->connexion->prepare($requette);
        $reponse->execute();

        $requette = null;
        $reponse = null;
    }

    /**
    * @param Int id
    * @return boolean
    */
    public function delete($id)
    {
        $verf = $this->AlreadyExist("`id_prod` = ".$id);
        if($verf)
        {
            $requette = "DELETE FROM `produit` WHERE `id_prod`=".$id;
            $reponse  = $this->connexion->prepare($requette);
            if($reponse->execute())
                return true;
            else
                return false;
        }
        else
        {
            return "Aucune entré correspondante";
        }
    }
}