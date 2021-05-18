<?php 

namespace Tools;

use PDOException;
use PDO;
class connexionPDO
{
    function connexionPDO()
    {
        $login = "selinarius";
        $mdp = "007007";
        $bd = "DeusExmenu";
        $serveur = "localhost";
        try{
            $conn = new PDO ('mysql:host='.$serveur.';dbname='.$bd.";",$login ,$mdp );
            return $conn;
        }catch(PDOException $e)
        {
            print "SITE : Erreur de connexion PDO : ".$e;
            die();
        }
    }
}
    
?>