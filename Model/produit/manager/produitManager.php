<?php

namespace Model\ManagerModel;

use Model\ClassModel\Produit;

class ManagerProduit
{
    private $connexion;
    public $entreprise;
    public $id;
    public $nom;

    public function __construct($db){
        $this->connexion = $db;
    }

    public function AlreadyExist($conditions)
    {
        //echo "Data : ".$data." Identifiant : ".$search_for."<br>";
        $requette = "select `id_prod` FROM `produit` WHERE ".$conditions;
        #echo $requette;
        $reponse  = $this->connexion->prepare($requette);
        $reponse->execute();
        $donnees=$reponse->fetch();
        #echo "Donnes : ".var_dump($donnees)." type = ".gettype($donnees)."<br>";
        if(gettype($donnees)=="boolean" && $donnees==false)
        {
            #echo "exist non<br>"; 
            return false;
        }
        else if(gettype($donnees)=="array")
        {
            #echo "exist oui<br>"; 
            return true;
        }    
    }

    public function getAll()
    {
            $requette = "select * FROM `produit` ;";
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

            return $categorie;
    }
    /**
    * @param Nom String
    * @return Produit || Boolean
    */
    public function getSelect($nom)
    {
        $requette = "select * FROM `produit` WHERE id_prod=".$nom.";";
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
        return $produit;
    }

    /**
    * @param Produit Object
    * @return boolean
    */
    public function insert($produit)
    {
        //require_once "../model/manager/man-produit.php";
        $verf = $this->AlreadyExist('`nom_prod` = "'.$produit->getNom().'";');
        var_dump($verf);
        if(!$verf)
        {
            echo "<br>HOY";
            $requette = "INSERT INTO `produit`(`nom_prod`, `composant_prod`, `prix_prod`, `id_entreprise_produit`) 
            VALUES (
                '".$produit->getNom()."',
                '".$produit->getComposant()."',
                ".$produit->getPrix().",
                ".$produit->getIdRelations().")";
            $reponse  = $this->connexion->prepare($requette);
            if($reponse->execute())
                return true;
            else
                return false;
        }else
        {
            return "Already exist";
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