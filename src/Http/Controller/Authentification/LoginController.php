<?php

declare(strict_types=1);

namespace MIS\Http\Controller\Authentification;
use MIS\Http\Controller\BaseController;
use MIS\Infrastructure\Authentification\AuthManager;
use MIS\Infrastructure\Repository\UserRepository;
use MIS\Infrastructure\Service\Session;

/**
 * permet de s'inscrire
 * Class LoginController
 * @package MIS\Http\Controller\Authentification
 */


class LoginController extends BaseController
{
    private UserRepository $repository;
    private AuthManager $authManager;
    public function __construct()
    {
        $this->repository = new UserRepository();
        $this->authManager = new AuthManager();
    }

    public function __invoke()
    {

        $this->isAuth();

        if($this->isRequest()){
            $result = $this->authManager->login($_POST['User']['email'],$_POST['User']['password']);
            if($result){
                $this->addFlashe('success',"Bienvenu");
            }else{
                $this->addFlashe('danger',"Erreur d'email ou de mot de passe .");
            }
            $this->redirect("/admin/product/list");
        }

       $this->render("Authentication/login");
    }
}
