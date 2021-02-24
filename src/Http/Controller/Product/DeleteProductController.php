<?php


namespace MIS\Http\Controller\Product;


use MIS\Http\Controller\BaseController;
use MIS\Infrastructure\Repository\ProductRepository;

class DeleteProductController extends BaseController
{

    public ProductRepository $repository;

    public function __construct()
    {
        $this->repository = new ProductRepository();
    }

    public function __invoke($id)
    {
        $this->isAuth();
        $this->repository->remove($id);
        $this->addFlashe('success',"le produit a bien ete supprimer");
        $this->redirect("/admin/product/list");
    }
}
