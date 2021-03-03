<?php

declare(strict_types=1);

namespace MIS\Http\Controller;

use MIS\Infrastructure\Service\Session;
use MIS\Infrastructure\Service\SessionAuth;
use Slim\Flash\Messages;

/**
 * Class BaseController
 * @package MIS\Http\Controller
 */
abstract class BaseController
{

    protected function render(string $path, $data = []):void
    {

        extract($data);
        ob_start();
        require_once "../view/$path.html.php";
        $content = ob_get_clean();
        require_once "../view/Base.html.php";
        die();
    }

    protected function isRequest():bool
    {

        if(!empty($_POST) && isset($_POST)){
            return true;
        }
        return false;
    }

    protected function isAuth()
    {

//        if(!SessionAuth::get('AUTH') &&  $_SERVER['REQUEST_URI'] !== "/login" ){
//            $this->redirect('/login');
//        }
//
//        if($_SERVER['REQUEST_URI'] === "/login" && SessionAuth::get('AUTH')){
//            $this->redirect('/admin/product/list');
//        }
    }

    protected function redirect(string $path)
    {
        header("Location: $path");
        die();
    }

    protected function addFlashe(string $key,string $message)
    {
        Session::add($key,$message);
    }

    protected function json(array $data,int $status = 200)
    {
        header('Content-Type:application/json');
        http_response_code($status);
        echo json_encode($data);
        exit();
    }


}
