<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Services\Category\CategoryServiceInterface;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    protected $categoryService;

    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    //
    public function showAddProductForm()
    {
        // Get all categories from the CategoryService
        $categories = $this->categoryService->getAllCategories();

        // Pass the categories to the view
        return view('admin.products.add', compact('categories'));
    }
}
