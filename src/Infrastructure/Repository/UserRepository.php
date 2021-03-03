<?php


namespace MIS\Infrastructure\Repository;
use Doctrine\ORM\EntityRepository;
use MIS\Domain\User\Repository\UserRepositoryInterface;
use MIS\Domain\User\Entity\UserEntity;
use MIS\EntityOrm\UserEntityORM;


class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    public function __construct()
    {
        parent::__construct(UserEntityORM::class);
    }

    public function findById(int $id): ?UserEntity
    {
        /** @var UserEntity $user */
        $user = parent::_findBy('id',$id);

        return self::hydrate($user);
    }

    public static function hydrate($user):UserEntity
    {
       $userEntity =  new UserEntity;

       $userEntity->setPassword($user->getPassword());
       $userEntity->setEmail($user->getEmail());
       $userEntity->setId($user->getId());

       return $userEntity;
    }

    public function findByEmail(string $email): ?UserEntity
    {
        /** @var UserEntity $user */

        $user = parent::_findBy("email",$email);

        return self::hydrate($user);
    }

    public function persist(UserEntity $userEntity): void
    {
        parent::_persist($userEntity);
    }

    public function findAll(): ?array
    {
        return parent::_findAll();
    }

    public function remove(int $id):void
    {
       $user =  $this->findById($id);

        parent::_remove($user);
    }
}
