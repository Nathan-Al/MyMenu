<?php 

namespace Tests;

require_once "../tools/connexion.php";
$database = connexionPDO();
require_once "../model/manager/man-entreprise.php";

$Mn_categorie = New ManagerEntreprise($database);
$name="";
if(isset($_GET["name_ent"]))
{
    $name= '"'.$_GET["name_ent"].'"';
}
    
$categorie = $Mn_categorie->getSelect($name);
//$Mn_categorie->insert()
var_dump($categorie);
echo json_encode($categorie);
echo gettype($_GET["name_ent"]);