<?php
namespace App\Controllers;

use Database\DBConnexion;

 abstract class Controller{
    protected $db;
    
    public function __construct(DBConnexion $db){
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }
        $this->db = $db;

    }

    protected function  views(string $path, array $params=null)
    {
        ob_start();
        $path = str_replace(".", DIRECTORY_SEPARATOR, $path);
        require VIEWS . $path . '.php';
        // if($params){
        //     $params = extract($params);
        // }

        $content = ob_get_clean();
        require VIEWS.'layout.php';
    }

    protected function getDB()
    {
        return $this->db;
    }

    protected function isAdmin()
    {
        if(isset($_SESSION["auth"]) && $_SESSION["auth"] === 1)
        {
            return true;
        }else{

            return  header("Location: /login");
        }
    } 
}
