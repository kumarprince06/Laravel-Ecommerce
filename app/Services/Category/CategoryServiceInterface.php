<?php

namespace App\Services\Category;

interface CategoryServiceInterface
{
    public function getAllCategories();

    public function getCategoryById(int $id);

    public function createCategory(array $data);

    public function updateCategory(int $id, array $data);

    public function deleteCategory(int $id);

    public function getAllCategoriesPaginated($perPage);
}
