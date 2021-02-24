<?php

declare(strict_types=1);

namespace MIS\Infrastructure\Repository;

use MIS\Domain\Product\Entity\ProductEntity;
use MIS\Domain\Product\Repository\ProductRepositoryInterface;

/**
 * Class ProductRepository
 * @package MIS\Infrastructure\Repository
 */
class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{

    protected string $table = "product";
    protected string $entity = ProductEntity::class;

    public function __construct()
    {
        parent::__construct();
    }

    public function findByRef(string $ref): ?ProductEntity
    {
        /** @var ProductEntity $product */
        $product = $this->_findBy('ref',$ref);
        return $product;
    }

    public function persist(ProductEntity $entity): void
    {
        if(!$entity->getId()){
                $sql = "INSERT INTO product SET ref = ? , name = ?, stock = ?";
            $param = [$entity->getRef(),$entity->getName(),$entity->getStock()];
        }else{
                $sql = "UPDATE product SET ref = ? , name = ?, stock = ? WHERE id = ?";
            $param = [$entity->getRef(),$entity->getName(),$entity->getStock(),$entity->getId()];
        }
        $stm =  $this->connexion->prepare($sql);

        $stm->execute($param);
    }

    public function remove(int $id): bool
    {
        return $this->_remove($id);
    }

    public function findAll(): ?array
    {
        return $this->_findAll();
    }

    public function search(string $query): ?array
    {
        $stm =  $this->connexion->prepare('SELECT * FROM product WHERE ref LIKE :ref');
        $stm->execute([':ref' => '%' . $query . '%']);
        return $stm->fetchAll(\PDO::FETCH_CLASS,$this->entity);
    }

    public function findById(int $id): ?ProductEntity
    {
        /** @var ProductEntity $product */
       $product = $this->_findBy('id',$id);

        return  $product;
    }
}
