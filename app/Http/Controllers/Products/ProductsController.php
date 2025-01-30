<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Services\Category\CategoryServiceInterface;
use App\Services\Images\ImageServiceInterface;
use App\Services\Products\ProductsServiceInterface;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    protected $categoryService;
    protected $productService;
    protected $imageService;

    public function __construct(CategoryServiceInterface $categoryService, ProductsServiceInterface $productService, ImageServiceInterface $imageService)
    {
        $this->categoryService = $categoryService;
        $this->productService = $productService;
        $this->imageService = $imageService;
    }

    //
    public function showAddProductForm()
    {
        // Get all categories from the CategoryService
        $categories = $this->categoryService->getAllCategories();

        // Pass the categories to the view
        return view('admin.products.add', compact('categories'));
    }

    public function index(Request $request)
    {
        $perPage = $request->query('perPage', 10);
        $categories = $this->categoryService->getAllCategories();
        $products = $this->productService->getAllProductsPaginated($perPage);

        // Check if the user is authenticated and their role is 'admin'
        if (auth()->check() && auth()->user()->role === 'admin') {
            return view('admin.products.index', compact('products'));
        }

        // Redirect unauthenticated or non-admin users to the products.index page
        return view('products.index', compact('products', 'categories'));
    }


    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'brand' => 'required|string',
            'stock' => 'required|integer',
            'base_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'type' => 'required|string',
            'category_id' => 'required|integer',
            'description' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Create Product
        $product = $this->productService->createProduct($request->only([
            'name',
            'brand',
            'stock',
            'base_price',
            'sale_price',
            'type',
            'category_id',
            'description'
        ]));

        // Store Images with product name
        if ($request->hasFile('images')) {
            $this->imageService->uploadImages($request->file('images'), $product->id, $product->name);
        }

        // Redirect to the product's show page
        return redirect()->route('admin.products.show', ['id' => $product->id])
            ->with('success', 'Product and images added successfully.');
    }

    public function show($id)
    {
        // Get the product by ID from the ProductService
        $product = $this->productService->getProductById($id);

        // If product doesn't exist, redirect to the product list with an error
        if (!$product) {
            return redirect()->route('admin.products.index')->with('error', 'Product not found.');
        }

        // Check if images are being loaded correctly
        // dd($product->images->toArray());

        // Pass the product to the view
        if (auth()->check() && auth()->user()->role === 'admin') {
            return view('admin.products.show', compact('product'));
        }

        return view('products.show', compact('product'));
    }
}
