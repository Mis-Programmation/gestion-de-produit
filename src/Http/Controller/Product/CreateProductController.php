<?php

declare(strict_types=1);

namespace MIS\Http\Controller\Product;

use MIS\Domain\Product\Entity\ProductEntity;
use MIS\Http\Controller\BaseController;
use MIS\Infrastructure\Repository\ProductRepository;

/**
 * Class CreateProductController
 * @package MIS\Http\Controller\Product
 */
class CreateProductController extends BaseController
{
    private ProductRepository $repository;

    public function __construct()
    {
        $this->repository = new ProductRepository();
    }

    public function __invoke()
    {
        $this->isAuth();
        if($this->isRequest()){
            $product = ProductEntity::create(
                $_POST['Product']['ref'],
                $_POST['Product']['name'],
                floatval( $_POST['Product']['stock'])
            );

            $this->repository->persist($product);

            $this->addFlashe('success',"le produit a bien ete cree  {$product->getName()}");
            $this->redirect("/admin/product/list");
        }

        $this->render("Product/createProduct");
    }

}
