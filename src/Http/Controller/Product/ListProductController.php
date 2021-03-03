<?php


namespace MIS\Http\Controller\Product;


use MIS\Domain\Product\Repository\ProductRepositoryInterface;
use MIS\Http\Controller\BaseController;
use MIS\Infrastructure\Repository\ProductRepository;
use MIS\Infrastructure\Service\Session;
use MIS\Infrastructure\Service\SessionAuth;


class ListProductController extends BaseController
{
    private ProductRepositoryInterface $repository;
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
