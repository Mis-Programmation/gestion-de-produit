<?php


namespace MIS\Infrastructure\Repository;
use MIS\Domain\User\Repository\UserRepositoryInterface;
use MIS\Domain\User\Entity\UserEntity;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected string $table = "user";
    protected string $entity = UserEntity::class;

   public function __construct()
   {
       parent::__construct();
   }

    public function findById(int $id): ?UserEntity
    {
        /** @var UserEntity $user */
        $user = $this->_findBy("id",$id);
        return $user;
    }

    public function findByEmail(string $email): ?UserEntity
    {
        /** @var UserEntity $user */

        $user = $this->_findBy("email",$email);

        return $user;
    }

    public function persist(UserEntity $userEntity): void
    {

        $stm = $this->connexion->prepare("INSERT INTO user SET email = ?,password = ?");
         $stm->execute([
                 $userEntity->getEmail(), $userEntity->getPassword()
         ]);
    }

    public function findAll(): ?array
    {
        return $this->_findAll();
    }

    public function remove(int $id): void
    {
        $this->_remove($id);
    }
}
