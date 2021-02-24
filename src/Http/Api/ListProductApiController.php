<?php


namespace MIS\Http\Api;


use MIS\Domain\Product\Entity\ProductEntity;
use MIS\Http\Controller\BaseController;
use MIS\Infrastructure\Repository\ProductRepository;

class ListProductApiController extends BaseController
{


    private ProductRepository $repository;

    public function __construct()
    {
        $this->repository = new ProductRepository();
    }

    public function __invoke()
    {

            $products =  $this->repository->findAll();
            $data = [];
            /** @var ProductEntity $product */
            foreach ($products as $product)
            {
                $data[] = [
                    'id' => $product->getId(),
                    'name' => $product->getName(),
                    'stock' => $product->getStock()
                ];
            }
            $this->json($data);
    }


}
