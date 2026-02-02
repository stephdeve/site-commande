<?php

use Router\Router;
use App\Exception\NotFoundException;
require "../vendor/autoload.php";

define('VIEWS', dirname(__DIR__).DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR);
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']).DIRECTORY_SEPARATOR);
// les données de la connexion
define('DB_NAME', 'shop1');
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PWD', '');
var_dump($_GET['url']); die();
$router = new Router($_GET["url"]);

$router->get("/", "App\Controllers\BlogController@home");//la fonction index de la class BlogController
$router->get("/posts", "App\Controllers\BlogController@index");
$router->get("/posts/:id", "App\Controllers\BlogController@show");
$router->get("/tags/:id", "App\Controllers\BlogController@tag");

$router->get("/login", "App\Controllers\UserController@login");
$router->post("/login", "App\Controllers\UserController@loginPost");
$router->get("/logout", "App\Controllers\UserController@logout");

$router->get("/admin/posts", "App\Controllers\admin\PostController@index");
$router->post("/admin/posts/delete/:id", "App\Controllers\admin\PostController@destroy");
$router->get("/admin/posts/create", "App\Controllers\admin\PostController@create");
$router->post("/admin/posts/create", "App\Controllers\admin\PostController@createPost");
$router->get("/admin/posts/edit/:id", "App\Controllers\admin\PostController@edit");
$router->post("/admin/posts/edit/:id", "App\Controllers\admin\PostController@update");
try{
    $router->run();
}catch(NotFoundException $e){
    echo $e->error404();
}
