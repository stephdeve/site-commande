<?php
namespace App\Models;

use App\Models\Model;

class User extends Model{

    protected $table =  'users';

    public function  getByUsername(string $username, string $password = null)
    {
        $vrify = 0;
        $array =  $this->query("SELECT * FROM {$this->table}");
        foreach($array as $i){
            if($username != $i->username && password_verify($password, $i->password ) == false){
                $vrify = 1;
                return $vrify;
            }elseif ($username == $i->username && password_verify($password, $i->password) == false) {
                $vrify = 2;
                return 2;
            }elseif($username != $i->username && password_verify($password, $i->password) == true){
                
                $vrify = 3;
                return 3;
            }
            
        }
        
        
        return $this->query("SELECT * FROM {$this->table} WHERE username = ?", [$username], true);
        
    }
}