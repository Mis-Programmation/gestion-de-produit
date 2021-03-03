<?php

declare(strict_types=1);

namespace MIS\Infrastructure\Repository;

use Doctrine\ORM\EntityRepository;
use MIS\Domain\Product\Entity\ProductEntity;
use MIS\Domain\Product\Repository\ProductRepositoryInterface;
use MIS\EntityOrm\ProductEntityORM;
use MIS\EntityOrm\UserEntityORM;

/**
 * Class ProductRepository
 * @package MIS\Infrastructure\Repository
 */
class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{

    public function __construct()
    {
        parent::__construct(ProductEntityORM::class);
    }


    public function findByRef(string $ref): ?ProductEntity
    {
        /** @var ProductEntity $product */
        $product = $this->_findBy('ref',$ref);

        return self::hydrate($product);
    }


    public function persist(ProductEntity $entity): void
    {
        if($entity->getId() !== null){
            /** @var  ProductEntityORM $product */
            $product = $this->repository->findOneBy(['id' => $entity->getId()]);
            $product->setName($entity->getName());
            $product->setRef($entity->getRef());
            $product->setStock($entity->getStock());

            parent::_persist($product);
            return;
        }

      parent::_persist(self::reverseHydrate($entity));
    }

    public static function reverseHydrate(ProductEntity $entity)
    {
        $product =  new ProductEntityORM();
        $product->setStock($entity->getStock());
        $product->setRef($entity->getRef());
        $product->setName($entity->getName());
        $product->setId($entity->getId());

        return $product;
    }

    public function remove(int $id): bool
    {

        $product = $this->_findBy("id",$id);

      return $this->_remove($product);
    }

    public function findAll(): ?array
    {
        return parent::_findAll();
    }

    public static function hydrate($entity):ProductEntity
    {
        $product = new ProductEntity;
        $product->setName($entity->getName());
        $product->setRef($entity->getRef());
        $product->setStock($entity->getStock());
        $product->setId($entity->getId());

        return $product;
    }

    public function search(string $query): ?array
    {
//        $stm =  $this->connexion->prepare('SELECT * FROM product WHERE ref LIKE :ref');
//        $stm->execute([':ref' => '%' . $query . '%']);
//        return $stm->fetchAll(\PDO::FETCH_CLASS,$this->entity);

        return [];
    }

    public function findById(int $id): ?ProductEntity
    {
        /** @var ProductEntity $product */
       $product = $this->_findBy("id",$id);

        return  self::hydrate($product);
    }
}
