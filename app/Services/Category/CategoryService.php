<?php

namespace App\Services\Category;

use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryService implements CategoryServiceInterface
{
    protected $categoryRepository;

    /**
     * Constructor to inject the CategoryRepositoryInterface.
     *
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Get all categories.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllCategories()
    {
        return $this->categoryRepository->getAll();
    }

    /**
     * Get a single category by ID.
     *
     * @param int $id
     * @return \App\Models\Category|null
     */
    public function getCategoryById(int $id)
    {
        return $this->categoryRepository->findById($id);
    }

    /**
     * Create a new category.
     *
     * @param array $data
     * @return \App\Models\Category
     */
    public function createCategory(array $data)
    {
        return $this->categoryRepository->create($data);
    }

    /**
     * Update an existing category by ID.
     *
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function updateCategory(int $id, array $data)
    {
        return $this->categoryRepository->update($id, $data);
    }

    /**
     * Delete a category by ID.
     *
     * @param int $id
     * @return bool
     */
    public function deleteCategory(int $id)
    {
        return $this->categoryRepository->delete($id);
    }


    public function getAllCategoriesPaginated($perPage = 10)
    {
        return $this->categoryRepository->getAllPaginated($perPage);
    }
}
