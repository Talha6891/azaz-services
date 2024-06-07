<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlanRequest;
use App\Http\Requests\UpdatePlanRequest;
use App\Models\Category;
use App\Models\Plan;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class PlanController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Plan::class,'plan');
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
                'name' => 'Plans',
                'url' => route('plans.index'),
                'active' => true
            ]
        ];

        $q = $request->get('q');
        $perPage = $request->get('per_page', 10);
        $sort = $request->get('sort');

        $plans = QueryBuilder::for(Plan::class)
            ->allowedSorts(['name','status','price','number_of_visits','created_at'])
            ->where('name', 'like', "%$q%")
            ->orWhere('status', 'like', "%$q%")
            ->orWhere('number_of_visits', 'like', "%$q%")
            ->orWhere('price', 'like', "%$q%")
            ->orWhere('created_at', 'like', "%$q%")
            ->latest()
            ->paginate($perPage)
            ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);

        return view('plans.index', [
            'plans' => $plans,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Plans'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */

    public function create(): View
    {
        $categories = Category::with('services')->get();
        $breadcrumbsItems = [
            [
                'name' => 'Create Plan',
                'url' => route('plans.create'),
                'active' => true
            ]
        ];

        return view('plans.create', [
            'categories' => $categories,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Create Plan'
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param StorePlanRequest $request
     * @return RedirectResponse
     */
    public function store(StorePlanRequest $request) : RedirectResponse
    {
            $validated = $request->validated();
            $services = $request->input('services', []);

            DB::beginTransaction();
            try {
                $plan = Plan::create([
                    'name' => $validated['name'],
                    'description' => $validated['description'] ?? null,
                     'price' => $validated['price'],
                      'duration' => $validated['duration'],
                      'duration_unit' => $validated['duration_unit'],
                      'status' => $validated['status'],
                      'number_of_visits' => $validated['number_of_visits'],
                ]);

                if (!empty($services) && is_array($services)) {
                    $plan->services()->sync($services);
                }

                DB::commit();

            return redirect()->route('plans.index')->with('message', 'Plan created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            // Log the error or handle it as needed
            Session::flash('error', 'Cannot create plan.');
            return redirect()->back();;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Plan $plan
     * @return View
     */
    public function show(Plan $plan) : View
    {
        $breadcrumbsItems = [
            [
                'name' => 'Plans',
                'url' => route('plans.index'),
                'active' => false
            ],
            [
                'name' => $plan->name,
                'url' => route('plans.show', $plan),
                'active' => true
            ]
        ];
        $plan->load('services');
                return view('plans.show', [
            'plan' => $plan,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => $plan->name
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Plan $plan
     * @return View
     */
    public function edit(Plan $plan): View
    {
        $categories = Category::with('services')->get();
        $breadcrumbsItems = [
            [
                'name' => 'Edit Plan',
                'url' => route('plans.edit', $plan),
                'active' => true
            ]
        ];

        return view('plans.edit', [
            'plan' => $plan,
            'categories' => $categories,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Edit Plan'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePlanRequest $request
     * @param Plan $plan
     * @return Response
     */
    public function update(UpdatePlanRequest $request, Plan $plan): RedirectResponse
    {
        $validated = $request->validated();
        $services = $request->input('services', []);

        DB::beginTransaction();
        try {
            $plan->update([
                'name' => $validated['name'],
                'description' => $validated['description'] ?? null,
                'price' => $validated['price'],
                'duration' => $validated['duration'],
                'duration_unit' => $validated['duration_unit'],
                'status' => $validated['status'],
                'number_of_visits' => $validated['number_of_visits'],
            ]);

            if (!empty($services) && is_array($services)) {
                $plan->services()->sync($services);
            }

            DB::commit();
            return redirect()->route('plans.index')->with('message', 'Plan updated successfully');

        } catch (\Exception $e) {

            DB::rollBack();
            Session::flash('error', 'Cannot update Plan');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Plan $plan
     * @return RedirectResponse
     */
    public function destroy(Plan $plan): RedirectResponse
    {
        try {
            $plan->services()->detach();
            $plan->delete();
            return redirect()->route('plans.index')->with('message', 'Plan deleted successfully.');
        } catch (\Exception $e) {
            Session::flash('error', 'Unable to delete plan.');
            return redirect()->back();
        }

    }
}
