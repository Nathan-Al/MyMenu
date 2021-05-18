<?php
require_once "../tools/connexion.php";
require_once "../model/manager/man-produit.php";
function Traitement($data,$action)
{
    $database = connexionPDO();
    $Mn_produit = New ManagerProduit($database);
    if($action=="readf")
    {
        $produit_obj = $Mn_produit->getSelect($data);
        //Verififcations que le retour ne sois pas vide
        if(gettype($produit_obj)=="object")
        {
            $produit_array["produit"] = 
            [
                "id"=>$produit_obj->getId(),
                "nom"=>$produit_obj->getNom(),
                "composant"=>$produit_obj->getComposant(),
                "prix"=>$produit_obj->getPrix()
            ];
            
            return $produit_array;
        }else
        {
           return false;
        }
    }
    else if($action=="readall")
    {
        $produit_arr = $Mn_produit->getSelectIdEnteprise($data);
        //echo "cont : ".var_dump($produit_arr)."<br>";
        if(gettype($produit_arr)=="array")
        {
            for($i=0; $i<sizeof($produit_arr); $i++)
            {
                $produit_array["produit"][$i] = 
                [
                    "id"=>$produit_arr[$i]->getId(),
                    "nom"=>$produit_arr[$i]->getNom(),
                    "composant"=>$produit_arr[$i]->getComposant(),
                    "prix"=>$produit_arr[$i]->getPrix()
                ];
            }
            
            
            return $produit_array;
        }else
        {
           return false;
        }
    }
    else if($action=="insert")
    {
        if(gettype($data)=="json")
        {
            $json_data = json_decode($data);
            $new_prod = new Produit(null,$json_data["name"],$json_data["component"],$json_data["price"],$json_data["relation"]);
        }
        else if(gettype($data)=="array")
        {
            $new_prod = new Produit(null,$data["name"],$data["component"],$data["price"],$data["relation"]);
        }
        if(gettype($new_prod)!="null")
        {
            return $Mn_produit->insert($new_prod);
        }
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
                return  $rep = $Mn_produit->delete($id);;
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