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


    public function create(Request $request)
    {

        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255', // Ensure the name is provided and within valid length
            'brand' => 'required|string|max:255', // Ensure the brand name is valid
            'stock' => 'required|integer|min:1', // Ensure the stock is a positive integer
            'originalPrice' => 'required|numeric|min:0', // Ensure the original price is a positive number
            'sellingPrice' => 'required|numeric|min:0', // Ensure the selling price is a positive number
            'type' => 'required|string|in:Physical,Digital', // Ensure the type is either 'Physical' or 'Digital'
            'category' => 'required|exists:categories,id', // Ensure the category exists in the categories table
            'description' => 'required|string|max:1000', // Optional description with a maximum length
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate product image(s)
        ]);

        
    }
}
