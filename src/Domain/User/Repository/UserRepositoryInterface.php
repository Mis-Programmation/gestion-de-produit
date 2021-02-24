<?php


namespace MIS\Domain\User\Repository;


use MIS\Domain\User\Entity\UserEntity;

interface UserRepositoryInterface
{
    public function __construct();

    /**
     * @param int $id
     * @return UserEntity|null
     */
    public function findById(int $id):?UserEntity;

    /**
     * @param UserEntity $entity
     */
    public function persist(UserEntity $entity):void;

    /**
     * @param int $id
     */
    public function remove(int $id):void ;

    /**
     * @return array|null
     */
    public function findAll():?array ;

    /**
     * @param string $email
     * @return UserEntity|null
     */
    public function findByEmail(string $email): ?UserEntity;
}
