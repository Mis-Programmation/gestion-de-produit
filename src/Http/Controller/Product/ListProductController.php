<?php


namespace MIS\Http\Controller\Product;


use MIS\Http\Controller\BaseController;
use MIS\Infrastructure\Repository\ProductRepository;

class ListProductController extends BaseController
{
    private ProductRepository $repository;
    public function __construct()
    {
        $this->repository = new ProductRepository();
    }

    public function __invoke()
    {
        $this->isAuth();

        $products =  $this->repository->findAll();
        $this->render("Product/listProduct",[
            'products' => $products
        ]);

    }

}
