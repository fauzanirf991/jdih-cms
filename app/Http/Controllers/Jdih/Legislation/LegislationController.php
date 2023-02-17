<?php

namespace App\Http\Controllers\Jdih\Legislation;

use App\Http\Controllers\Controller;
use App\Http\Traits\VisitorTrait;
use Illuminate\Http\Request;
use App\Models\Legislation;
use App\Models\Category;

class LegislationController extends Controller
{
    use VisitorTrait;
    protected $limit = 10;
    protected $selectedCategories;

    function __construct()
    {
        $this->selectedCategories = Category::ofType(1)->inRandomOrder()->take(4)->pluck('id');
    }

    public function index(Request $request)
    {
        $legislations = Legislation::with(['category', 'category.type'])
            ->filter($request)
            ->published()
            ->sorted($request)
            ->paginate($this->limit)
            ->withQueryString();

        $categories = Category::sorted()
            ->pluck('name', 'id');

        $orderState = match ($request->order) {
            'latest'        => 'Terbaru',
            'popular'       => 'Terpopular',
            'most-viewed'   => 'Dilihat paling banyak',
            'rare-viewed'   => 'Dilihat paling sedikit',
            default         => 'Terbaru',
        };

        $vendors = [
            'assets/jdih/js/vendor/forms/selects/select2.min.js',
        ];

        return view('jdih.legislation.index', compact(
            'legislations',
            'categories',
            'orderState',
            'vendors',
        ));
    }

    public function lawYearlyColumnChart(Request $request)
    {
        if ($request->has('years')) {
            $years = $request->years;
            sort($years);
        } else {
            $years = [
                date("Y", strtotime("-4 year")),
                date("Y", strtotime("-3 year")),
                date("Y", strtotime("-2 year")),
                date("Y", strtotime("-1 year")),
                date("Y")
            ];
        }

        $selectedCategories = ($request->has('categories')) ? $request->categories : $this->selectedCategories;
        $categories = Category::ofType(1)->whereIn('id', $selectedCategories)->pluck('abbrev', 'id')->toArray();

        foreach ($categories as $key => $value) {

            $data = [];
            foreach ($years as $year) {
                $data[] = Legislation::ofType(1)
                    ->published()
                    ->where('legislations.year', $year)
                    ->where('legislations.category_id', $key)
                    ->count();
            }

            $series[] = [
                'name'  => $value,
                'type'  => 'bar',
                'data'  => $data,
                'id'    => $key,
                'itemStyle' => [
                    'normal'  => [
                        'barBorderRadius' => [4, 4, 0, 0],
                        'label' => [
                            'show'  => true,
                            'position'  => 'top',
                            'fontWeight'=> 500,
                            'fontSize'  => 12,
                            'color' => 'var(--body-color)'
                        ]
                    ]
                ],
                'markLine'  => [
                    'data'  => [
                        0   => [
                            'type'  => 'average',
                            'name'  => 'Average'
                        ]
                    ],
                    'label' => [
                        'color' => 'var(--body-color)'
                    ]
                ]
            ];

            $legend[] = $value;
        }

        $json = [
            'categories'=> $legend,
            'years'     => $years,
            'series'    => $series
        ];

        return response()->json($json);
    }
}
