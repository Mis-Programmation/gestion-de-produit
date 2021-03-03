<?php

declare(strict_types=1);

namespace MIS\EntityOrm;


use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity()
 * @ORM\Table(name="user")
 * Class UserEntityORM
 * @package MIS\Core\EntityOrm
 */
class UserEntityORM
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="bigint")
     * @var int
     */
    private int $id;

    /**
     * @var string
     * @ORM\Column(type="string",nullable=false,length=255)
     */
    private string $email;

    /**
     * @var string
     * @ORM\Column(type="string",nullable=false,length=255)
     */
    private string $password;

    /**
     * UserEntity constructor.
     * @param string $email
     * @param string $password
     * @return self
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
