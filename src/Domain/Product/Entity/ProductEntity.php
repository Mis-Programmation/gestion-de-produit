<?php

declare(strict_types=1);

namespace MIS\Domain\Product\Entity;

use phpDocumentor\Reflection\Types\This;

/**
 * Class ProductEntity
 * @package MIS\Domain\Product\Entity
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
    private string $ref;


    /**
     * @var string
     */
    private string $name;

    /**
     * @var float
     */
    private float $stock;

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


}
