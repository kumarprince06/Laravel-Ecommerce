<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Services\Category\CategoryServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    protected $categoryService;

    /**
     * Constructor to inject CategoryServiceInterface.
     *
     * @param CategoryServiceInterface $categoryService
     */
    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    /**
     * Show the Add Category form.
     *
     * @return \Illuminate\View\View
     */
    public function showAddCategoryForm()
    {
        return view('admin.categories.add');
    }


    public function index(Request $request)
    {
        $perPage = $request->query('perPage', 10); // Default 10 items per page
        $categories = $this->categoryService->getAllCategoriesPaginated($perPage);
        return view('admin.categories.index', compact('categories'));
    }


    /**
     * Store a new category.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $this->categoryService->createCategory($validatedData);

        return redirect()->route('categories.index')->with('success', 'Category added successfully.');
    }


    public function edit($id)
    {
        $category = $this->categoryService->getCategoryById($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update a category.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Validate Request
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
        ]);

        // Find Category by ID
        $category = $this->categoryService->getCategoryById($id);

        // Update Category Name
        $category->name = $request->name;
        $category->slug = Str::slug($request->name); // Update slug automatically
        $category->save();

        // Redirect to Category List with Success Message
        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }

    /**
     * Delete a category.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $this->categoryService->deleteCategory($id);
            return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('categories.index')->with('error', 'Failed to delete category.');
        }
    }
}
