<?php

declare(strict_types=1);

namespace MIS\Domain\Product\Repository;


use MIS\Domain\Product\Entity\ProductEntity;


/**
 * Interface ProductRepositoryInterface
 * @package MIS\Domain\Product\Repository
 */
interface ProductRepositoryInterface
{


    /**
     * @param string $ref
     * @return ProductEntity|null
     */
    public function findByRef(string $ref):?ProductEntity;

    /**
     * @param int $id
     * @return ProductEntity|null
     */
    public function findById(int $id):?ProductEntity;

    /**
     * @param ProductEntity $entity
     */
    public function persist(ProductEntity $entity):void;

    /**
     * @param int $id
     * @return bool
     */
    public function remove(int $id):bool ;

    /**
     * @return array|null
     */
    public function findAll():?array ;

    /**
     * @param string $query
     * @return array|null
     */
    public function search(string $query): ?array;

}
