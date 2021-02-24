<?php

declare(strict_types=1);

namespace MIS\Http\Controller\Authentification;

use MIS\Http\Controller\BaseController;
use MIS\Infrastructure\Authentification\AuthManager;
use MIS\Infrastructure\Repository\UserRepository;

/**
 * Class CreateAccount
 * @package MIS\Http\Controller\Authentification
 */

class CreateAccountController extends BaseController
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
        if($this->isRequest()){
            $this->authManager->create($_POST['User']['email'],$_POST['User']['password']);
            $this->redirect('login');
        }

        $this->render("Authentication/singUp");
    }

}
