<?php



use MIS\Core\Routing\Router;


require_once "./../vendor/autoload.php";

if(session_status() === PHP_SESSION_NONE){
    session_start();
}



if( isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI']=== "/logout")
{
    \MIS\Infrastructure\Service\SessionAuth::remove('AUTH');
    header('Location: /login');
    exit();
}


if(!isset($_SERVER['REQUEST_URI']) && empty($_SERVER['REQUEST_URI'])){

    header('Location: /login');
    exit();
}


$router = new Router($_SERVER['REQUEST_URI']);


$router
    ->get("/","Http/Controller/Authentification/LoginController")
    ->get("login","Http/Controller/Authentification/LoginController")
    ->get("singUp","Http/Controller/Authentification/CreateAccountController")
    ->get("product/index","Http/Controller/Product/IndexProductController")
    ->get("admin/product/add","Http/Controller/Product/CreateProductController")
    ->get("admin/product/list","Http/Controller/Product/ListProductController")
    ->get("admin/product/edit/:id","Http/Controller/Product/EditProductController")
    ->get("admin/product/delete/:id","Http/Controller/Product/DeleteProductController")
    ->get("api/search/:query","Http/Api/SearchProductApiController")
    ->get("api/list","Http/Api/ListProductApiController")
    ->run();


