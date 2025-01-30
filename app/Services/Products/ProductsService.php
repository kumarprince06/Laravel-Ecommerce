<?php

namespace App\Services\Products;

use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Services\Products\ProductsServiceInterface;

class ProductsService implements ProductsServiceInterface
{

    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAllProducts()
    {
        return $this->productRepository->getAll();
    }

    public function createProduct(array $data)
    {
        return $this->productRepository->create($data);
    }

    public function getProductById(int $id)
    {
        // Eager load the images relationship
        return $this->productRepository->findById($id)->load('images');
    }

    public function getAllProductsPaginated($perPage)
    {
        return $this->productRepository->getAllPaginated($perPage);
    }
}
