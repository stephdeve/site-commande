<?php

namespace App\Controllers;
use App\Models\User;
use App\Validation\Validator;

class UserController extends Controller{

    public function login()
    {
        return $this->views('auth.login');
    }

    public function loginPost()
    {
        $validator = new Validator($_POST);
        $errors = $validator->validate([
            'username' => ['required', 'min:3'],
            'password' => ['required']
        ]);
        // var_dump($errors); die();
        if($errors){
            $_SESSION['errors'][] = $errors;
            header('Location: /login');
            exit;
        }
        $user = (new User($this->getDB()))->getByUsername($_POST["username"], $_POST["password"]);
        #var_dump($user); die();
        if($user == 1){
            $erreur = "Le username et le password sont incorrects ...";
            $_SESSION['erreur'] = $erreur;
        }elseif($user == 2){
            $erreur = "Le password est incorrect ...";
            $_SESSION['erreur'] = $erreur;
        }elseif($user == 3){
            $erreur = "Le username est incorrect ...";
            $_SESSION['erreur'] = $erreur;
        }
        #print_r($user); die();
        if(password_verify($_POST['password'], $user->password))
        {
            $_SESSION["auth"] = (int) $user->admin;
            return header("Location: /admin/posts?success=true");

        }else{
            return header("Location: /login");
        }

    }

    public function logout()
    {
        session_destroy();
        return header("Location: /");
    }
}