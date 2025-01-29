<?php

namespace App\Repositories\Interfaces;

interface ProductRepositoryInterface
{
    public function getAll();  // Fetch all products
    public function findById($id); // Find product by ID
    public function create(array $data); // Create a new product
    public function update($id, array $data); // Update an existing product
    public function delete($id); // Delete a product
}
