<?php

namespace App\Http\Controllers\Home;

use App\Enums\FuelEnum;
use App\Enums\TransmissionEnum;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\CarCategory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CatalogController extends Controller
{

    /**
     * Display the catalog view.
     */
    public function index(Request $request)
    {
        $categories = $request->boolean('all')
            ? CarCategory::orderBy('name')->get()
            : CarCategory::orderBy('name')->paginate(5)->withQueryString();

        $fuels = FuelEnum::options();
        $transmissions = TransmissionEnum::options();
        $cars = $this->catalogQuery($request);

        return Inertia::render('Catalog/Index', [
            'categories'    => $categories,
            'fuels'         => $fuels,
            'transmissions' => $transmissions,
            'cars'          => $cars,
            'filters'       => $request->only(['search', 'transmission', 'fuel', 'category', 'sort']),
        ]);
    }


    /**
     * Build a query for the catalog based on the given request.
     *
     * The query can be filtered by search, transmission, fuel, category, and sort.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    private function catalogQuery($request = null)
    {

        $filters = [
            'search'        => $request->search,
            'transmission'  => $request->transmission,
            'fuel'          => $request->fuel,
            'category'      => $request->category,
            'sort'          => $request->sort,
        ];

        $cars = Car::query()
            ->with('category')
            ->when($filters['search'], function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('brand', 'like', "%{$search}%")
                        ->orWhere('model', 'like', "%{$search}%")
                        ->orWhere('year', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%");
                });
            });

        if ($filters['transmission'] && $filters['transmission'] !== 'all-transmision') {
            $cars->where('transmission', $filters['transmission']);
        }

        if ($filters['fuel'] && $filters['fuel'] !== 'all-fuel') {
            $cars->where('fuel_type', $filters['fuel']);
        }

        if ($filters['category'] && $filters['category'] !== 'all-category') {
            $cars->whereHas('category', function ($query) use ($filters) {
                $query->where('slug', $filters['category']);
            });
        }

        if ($filters['sort'] && $filters['sort'] !== 'all-short') {
            switch ($filters['sort']) {
                case 'price-asc':
                    $cars->orderBy('price_per_day', 'asc');
                    break;
                case 'price-desc':
                    $cars->orderBy('price_per_day', 'desc');
                    break;
                case 'year-asc':
                    $cars->orderBy('year', 'desc');
                    break;
                case 'year-desc':
                    $cars->orderBy('year', 'asc');
                    break;
                default:
                    $cars->latest();
                    break;
            }
        } else {
            $cars->latest();
        }

        $cars = $cars->latest()
            ->paginate(6)
            ->withQueryString();

        return $cars;
    }
}
