<?php

declare(strict_types=1);

namespace MIS\Domain\Product\Entity;

/**
 * Class ProductEntity
 * @package MIS\Domain\Product\Entity
 * 
 */
class ProductEntity
{
    /**
     * @var int
     */
    private ?int $id = null;

    /**
     * @var string
     */
    private ?string $ref = null;


    /**
     * @var string
     */
    private ?string $name = null;

    /**
     * @var float
     */
    private ?float $stock = null;

    /**
     * @param string $ref
     * @param string $name
     * @param float $stock
     * @return ProductEntity
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

    /**
     * @return string
     */
    public function getRef(): ?string
    {
        return $this->ref;
    }

    /**
     * @param string $ref
     */
    public function setRef(?string $ref): void
    {
        $this->ref = $ref;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getStock(): ?float
    {
        return $this->stock;
    }

    /**
     * @param float $stock
     */
    public function setStock(?float $stock): void
    {
        $this->stock = $stock;
    }


}
