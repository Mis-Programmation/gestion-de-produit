<?php

declare(strict_types=1);

namespace MIS\EntityOrm;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="product")
 * Class ProductEntity
 * @package MIS\Domain\Product\Entity
 * 
 */
class ProductEntityORM
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="bigint")
     * @var int
     */
    private ?int $id = null;

    /**
     * @var string
     * @ORM\Column(type="string",length=255)
     */
    private string $ref;


    /**
     * @var string
     * @ORM\Column(type="string",length=255)
     */
    private string $name;

    /**
     * @var float
     * @ORM\Column(type="string",length=255)
     */
    private float $stock;

    /**
     * @param string $ref
     * @param string $name
     * @param float $stock
     * @return self
     */
    public static function create(string $ref, string $name, float $stock)
    {
        $self = new self();
        $self->setRef($ref);
        $self->setName($name);
        $self->setStock($stock);

        return $self;
    }

    /**
     * @return string
     */
    public function getRef(): string
    {
        return $this->ref;
    }


    /**
     * @param string $ref
     * @return $this
     */
    public function setRef(string $ref): self
    {
        $this->ref = $ref;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return float
     */
    public function getStock(): float
    {
        return $this->stock;
    }

    /**
     * @param float $stock
     * @return $this
     */
    public function setStock(float $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }


}
