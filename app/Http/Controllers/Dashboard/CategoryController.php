<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CarCategory;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $perPage = $request->input('per_page', 10);

        $carCategories = CarCategory::query()
            ->when($request->search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate($perPage)
            ->withQueryString();

        return Inertia::render('Dashboard/Category/Index', [
            'carCategories' => $carCategories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'description'   => 'nullable|string',
        ]);

        $slug = SlugService::createSlug(CarCategory::class, 'slug', $request->name);

        CarCategory::create([
            'name'          => $request->name,
            'slug'          => $slug,
            'description'   => $request->description,
        ]);

        return redirect()->route('dashboard.category.index')->with('success', 'Category berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CarCategory $category)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'description'   => 'nullable|string',
        ]);

        if ($category->name != $validated['name']) {
            $slug = SlugService::createSlug(CarCategory::class, 'slug', $validated['name']);
        }

        $category->update([
            'name'          => $validated['name'],
            'slug'          => $slug ?? $category->slug,
            'description'   => $validated['description'],
        ]);

        return redirect()->route('dashboard.category.index')->with('success', 'Category berhasil dihapus');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CarCategory $category)
    {

        $category->delete();

        return redirect()->route('dashboard.category.index')->with('success', 'Category berhasil dihapus');
    }
}
