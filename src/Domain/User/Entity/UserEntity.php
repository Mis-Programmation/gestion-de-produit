<?php

declare(strict_types=1);

namespace MIS\Domain\User\Entity;


/**
 * Class UserEntity
 * @package MIS\Domain\User\Entity
 */
class UserEntity
{
    private int $id;

    private string $email;

    private string $password;

    /**
     * UserEntity constructor.
     * @param string $email
     * @param string $password
     * @return UserEntity
     */
    public static function create(string $email, string $password):self
    {
        $user =  new self();
        $user->setEmail($email);
        $user->setPassword($password);

        return $user;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }




}
