<?php


declare(strict_types=1);

namespace MIS\Http\Api;

use MIS\Domain\Product\Entity\ProductEntity;
use MIS\Http\Controller\BaseController;
use MIS\Infrastructure\Repository\ProductRepository;

/**
 * Class SearchProductApiController
 * @package MIS\Http\Controller\Product
 */
class SearchProductApiController extends BaseController
{

    private ProductRepository $repository;

    public function __construct()
    {
        $this->repository = new ProductRepository();
    }

     public function __invoke($query)
     {

        if(isset($query) && !empty($query))
        {

            $products = $this->repository->search(htmlentities($query));
            $data = [];
            /** @var ProductEntity $product */
            foreach ($products as $product)
            {
                $data[] = [
                    'id'    => $product->getId(),
                    'ref'   => $product->getRef(),
                    'name'  => $product->getName(),
                    'stock' => $product->getStock()
                ];
            }
            $this->json($data);
        }
        $this->json([]);
     }

}
