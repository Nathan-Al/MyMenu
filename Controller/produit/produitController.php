<?php

namespace Controller;

require_once "./Model/produit/manager/produitManager.php";

use Model\ManagerModel\ManagerProduit;
use Model\ClassModel\Produit;

class ProduitController
{
    /**
     * Datas treatment
     * 
     * @param data $data Entreprise data
     * 
     * @return array|boolean
     */

    function Traitement($data,$action,$database)
    {
        $MnProduit = New ManagerProduit($database);
        if($action=="read")
        {
            $produit = $MnProduit->getSelect($data);

            if(gettype($produit)=="object")
            {
                return $produit;
            }else
            {
               return false;
            }
        }
        else if($action=="readall")
        {
            $produit = $MnProduit->getAll();

            if(!empty($produit))
            {
                return $produit;
            }else
            {
               return false;
            }
        }
        else if($action=="insert")
        {
            $MnProduit = New ManagerProduit($database);
            $result = [];
            foreach ($data->data as $key => $value) {
                $produit = new Produit(0,$value->name,$value->composant,$value->price,$value->relations);
                $result[] = $MnProduit->insert($produit);
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
        else if($action=="update")
        {
    
        }
        else if($action=="delete")
        {
            if(isset($data["idd"]))
            {
                $id = (int)$data["idd"];
                if(gettype($id)=="integer")
                {
                    return  $rep = $MnProduit->delete($id);;
                }else
                {
                    return "Mauvaise type de données";
                }
            }else
            {
                return "Aucune donnée";
            }
            
        }
       
    }
}

