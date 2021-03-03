<?php

declare(strict_types=1);

namespace MIS\Infrastructure\Authentification;

use MIS\Domain\User\Entity\UserEntity;
use MIS\Infrastructure\Repository\UserRepository;
use MIS\Infrastructure\Service\SessionAuth;

/**
 * Class AuthManager
 * @package MIS\Infrastructure\Authentification
 */

final class AuthManager
{
    private UserRepository $repository;
    public function __construct()
    {
        $this->repository = new UserRepository;
    }

    public function login(string $email,string $password):bool
    {

        $user = $this->repository->findByEmail($email);

        if(null === $user){
            return false;
        }

        if(password_verify($password,$user->getPassword()))
        {
            SessionAuth::add("AUTH",['id' => $user->getId()]);

            return true;
        }
        return false;
    }

    public function create(string $email,string $password):bool
    {

        $user = $this->repository->findByEmail($email);

        if(null !== $user){
            return false;
        }
        $user = UserEntity::create($email,$password);
        $user->setPassword(password_hash($password,PASSWORD_ARGON2I));
        $this->repository->persist($user);

        return true;
    }

}
