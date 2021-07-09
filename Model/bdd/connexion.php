<?php 

namespace Model;

require "./tools/dotoenv.php";

use DevCoder\DotEnv as Dev;
use PDOException;
use PDO;

class connexionPDO
{
    private $conn;
    function connexionPDO()
    {
        (new Dev('.env'))->load();

        $login = getenv('DATABASE_USER');
        $mdp = getenv('DATABASE_MDP');
        $bd = getenv('DATABASE_NAME');
        $serveur = getenv('DATABASE_URL');
        try{
            $this->conn = new PDO ('mysql:host='.$serveur.';dbname='.$bd.";",$login ,$mdp );
            return $this->conn;
        }catch(PDOException $e)
        {
            print "SITE : Erreur de connexion PDO : ".$e;
            die();
        }
    }

    function deconnexionPDO()
    {
        $this->conn = null;
    }
}
    
?>
