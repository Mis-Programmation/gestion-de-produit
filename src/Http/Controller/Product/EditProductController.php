<?php

declare(strict_types=1);

namespace MIS\Http\Controller\Product;


use MIS\Http\Controller\BaseController;
use MIS\Infrastructure\Repository\ProductRepository;

/**
 * Class EditProductController
 * @package MIS\Http\Controller\Product
 */
class EditProductController extends BaseController
{

    private ProductRepository $repository;
    public function __construct()
    {
        $this->repository = new ProductRepository();
    }

    public function __invoke($id)
    {
        $this->isAuth();
        $product =  $this->repository->findById((int)$id);
        if(!$product){
            new \Exception("cet produit n'existe pas");
        }

        if($this->isRequest())
        {
            $product->setRef($_POST["Product"]['ref']);
            $product->setName($_POST["Product"]['name']);
            $product->setStock(floatval($_POST["Product"]['stock']));
            $this->repository->persist($product);

            $this->addFlashe('success',"le produit a bien ete modifier");
            $this->redirect("/admin/product/list");
        }


        $this->render("Product/editProduct",[
            'product' => $product
        ]);
    }


}
