<?php

declare(strict_types=1);

namespace MIS\Http\Controller\Product;

use MIS\Domain\Product\Entity\ProductEntity;
use MIS\Http\Controller\BaseController;
use MIS\Infrastructure\Repository\ProductRepository;

/**
 * Class IndexProductController
 * @package MIS\Http\Controller\Product
 */

class IndexProductController extends BaseController
{

    private ProductRepository $repository;

    public function __construct()
    {
        $this->repository = new ProductRepository();
    }

    public function __invoke()
    {
        $this->isAuth();

        $this->render("Product/index");
    }
}
