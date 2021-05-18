<?php 

namespace Tools;

use PDOException;
use PDO;
class connexionPDO
{
    function connexionPDO()
    {
        $login = "";
        $mdp = "";
        $bd = "";
        $serveur = "";
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
