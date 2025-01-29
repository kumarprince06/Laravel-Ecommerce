<?php

namespace App\Services\Products;

interface ProductsServiceInterface
{
    public function createProduct(array $data);

    // public function updateProduct(int $id, array $data);

    // public function deleteProduct(int $id);

    public function getAllProducts();

    public function getProductById(int $id);
}
