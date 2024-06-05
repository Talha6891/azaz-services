<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\QueryBuilder\QueryBuilder;

class ServiceController extends Controller
{
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
                'name' => 'Services',
                'url' => route('services.index'),
                'active' => true
            ]
        ];

        $q = $request->get('q');
        $perPage = $request->get('per_page', 10);
        $sort = $request->get('sort');

        $services = QueryBuilder::for(Service::class)
            ->allowedSorts(['name', 'created_at'])
            ->where('name', 'like', "%$q%")
            ->orWhere('created_at', 'like', "%$q%")
            ->with('category')
            ->latest()
            ->paginate($perPage)
            ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);

        return view('services.index', [
            'services' => $services,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Services'
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
                'url' => route('services.index'),
                'active' => false
            ],
            [
                'name' => 'Create',
                'url' => route('services.create'),
                'active' => true
            ],
        ];
        $categories = Category::all();
        return view('services.create', [
            'breadcrumbItems' => $breadcrumbsItems,
            'categories' => $categories,
            'pageTitle' => 'Create Service'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreServiceRequest $request
     * @return RedirectResponse
     */
    public function store(StoreServiceRequest $request): RedirectResponse
    {
        try {
            Service::create($request->validated());

            return redirect()->route('services.index')->with('message', 'Service created successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to create service']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Service $service
     * @return View
     */
    public function show(Service $service): View
    {
        $breadcrumbsItems = [
            [
                'name' => 'Services',
                'url' => route('services.index'),
                'active' => false
            ],
            [
                'name' => 'Show',
                'url' => '#',
                'active' => true
            ],
        ];

        return view('services.show', [
            'service' => $service->load('category'),
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Show Service',
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Service $service
     * @return View
     */
    public function edit(Service $service) : View
    {
        $breadcrumbsItems = [
            [
                'name' => 'Services',
                'url' => route('services.index'),
                'active' => false
            ],
            [
                'name' => 'Edit',
                'url' => '#',
                'active' => true
            ],
        ];
        $categories = Category::all();
        return view('services.edit', [
            'service' => $service->load('category'),
            'categories' => $categories,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Edit Service',
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateServiceRequest $request
     * @param Service $service
     * @return RedirectResponse
     */
    public function update(UpdateServiceRequest $request, Service $service) : RedirectResponse
    {
        $validatedData = $request->validated();

        $service->update($validatedData);

        return redirect()->route('services.index')->with('message', 'Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Service $service
     * @return RedirectResponse
     */
    public function destroy(Service $service): RedirectResponse
    {
        $service->delete();

        return redirect()->route('services.index')->with('message', 'Service deleted successfully.');

    }
}