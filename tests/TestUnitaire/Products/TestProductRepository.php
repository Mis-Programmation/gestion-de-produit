<?php

declare(strict_types=1);

namespace TestUnitaire\Products;


use Exception;
use MIS\Domain\Product\Entity\ProductEntity;
use MIS\Domain\Product\Repository\ProductRepositoryInterface;
use MIS\Infrastructure\Repository\ProductRepository;
use PHPUnit\Framework\TestCase;

/**
 * Class TestProductRepository
 * @package TestUnitaire\Products
 */
class TestProductRepository extends TestCase
{

      public static function getRepository():ProductRepositoryInterface
      {
            return new ProductRepository;
      }

    /**
     * permet de tester la method ajout et suppression
     * @throws Exception
     */
    public function testAddAndDeleteProductOnSuccess()
    {
        $product = new ProductEntity;

        $product
            ->setRef($this->strRandom());
            $product->setName($this->strRandom());
           $product->setStock(mt_rand(100,1000));

        // ajouter le produit dans la base de donnee
        self::getRepository()->persist($product);

        // chercher le produit dans la base de donnee
        $productInDataBase =  self::getRepository()->findByRef($product->getRef());

        $this->assertEquals($product->getRef(),$productInDataBase->getRef());

        // supprimer le produit dans la base de donnee
        $isDeleted = self::getRepository()->remove($productInDataBase->getId());

        self::assertTrue($isDeleted);

    }


    private function strRandom():string
    {
        return "test". mt_rand(100,1000);
    }

}
