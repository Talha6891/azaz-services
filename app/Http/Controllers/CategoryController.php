<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\QueryBuilder;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Category::class,'category');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $breadcrumbsItems = [
            [
                'name' => 'Categories',
                'url' => route('categories.index'),
                'active' => true
            ],
        ];

        $q = $request->get('q');
        $perPage = $request->get('per_page', 10);
        $sort = $request->get('sort');

        $categories = QueryBuilder::for(Category::class)
            ->allowedSorts(['name', 'created_at'])
            ->where('name', 'like', "%$q%")
            ->orWhere('created_at', 'like', "%$q%")
            ->latest()
            ->paginate($perPage)
            ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);

        return view('categories.index', [
            'categories' => $categories,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Categories'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create() : View
    {
        $breadcrumbsItems = [
            [
                'name' => 'Categories',
                'url' => route('categories.index'),
                'active' => false
            ],
            [
                'name' => 'Create',
                'url' => route('categories.create'),
                'active' => true
            ],
        ];

        return view('categories.create', [
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Create Category'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCategoryRequest $request
     * @return RedirectResponse
     */

    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        try {
            $validated = $request->validated();
            $validated['user_id'] = Auth::id();

            Category::create($validated);

            return redirect()->route('categories.index')->with('message', 'Category updated successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to create category']);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return View
     */
    public function show(Category $category): View
    {
        $breadcrumbsItems = [
            [
                'name' => 'Categories',
                'url' => route('categories.index'),
                'active' => false
            ],
            [
                'name' => 'Show',
                'url' => '#',
                'active' => true
            ],
        ];

        return view('categories.show', [
            'category' => $category->load('user'),
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Show category',
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return View
     */
    public function edit(Category $category): View
    {
        $breadcrumbsItems = [
            [
                'name' => 'Users',
                'url' => route('categories.index'),
                'active' => false
            ],
            [
                'name' => 'Edit',
                'url' => '#',
                'active' => true
            ],
        ];

        return view('categories.edit', [
            'category' => $category,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Edit User',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCategoryRequest $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(UpdateCategoryRequest $request, Category $category): RedirectResponse
    {
        try {
            $validated = $request->validated();
            $category->update($validated);

            return redirect()->route('categories.index')->with('message', 'Category updated successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to update category']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return RedirectResponse
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return to_route('categories.index')->with('message', 'Category updated successfully.');
    }
}
