<?php

namespace App\Http\Controllers;

use App\Models\aboutUs;
use App\Models\Category;
use App\Models\Characteristic;
use App\Models\Contact_information;
use App\Models\Product;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use App\Models\Variation;
use Illuminate\Support\Facades\DB;
use App\Models\Value;






class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $commonInfo = $this->commonInfo();
        $cat = Category::get();
        return view('template.pages.home', compact('commonInfo', 'cat'));
    }
    public function about()
    {
        $commonInfo = $this->commonInfo();
        $abouts = aboutUs::get();
        $staffs = Staff::get();
        return view('template.pages.about-us', compact('commonInfo', 'abouts', "staffs"));
    }




    public function productGrid(Request $request, $slug = null, $sub_slug = null)
    {

        $commonInfo = $this->commonInfo();
        $sort = $request->input('sort');

        $filter = $request->input('filter');
        $category = $request->input('category');




        if ($filter != null || $category != null /* || ($filter != null &&  $category != null) */) {


            $query = Product::query();
            if ($category && $filter) {
                $query->where(function ($query) use ($category, $filter) {
                    $query->where(function ($query) use ($category) {
                        $query->where('category_id', $category)
                            ->orWhere('sub_category_id', $category);
                    })
                        ->where("name", 'like', '%' . $filter . '%');
                });
            } else {

                if ($category) {
                    $query->where(function ($query) use ($category) {
                        $query->where('category_id', $category)
                            ->orWhere('sub_category_id', $category);
                    });
                }
                if ($filter) {
                    $query->where("name", 'like', '%' . $filter . '%');
                }
            }


            switch ($sort) {
                case 'Low - High Price':
                    $query->orderBy('price');
                    break;
                case 'High - Low Price':
                    $query->orderByDesc('price');
                    break;
                case 'A - Z Order':
                    $query->orderBy('name');
                    break;
                case 'Z - A Order':
                    $query->orderByDesc('name');
                    break;
                default:

                    $query->orderBy('id', 'asc');
            }
            $products = $query->paginate(2)->withQueryString();

            $quantity = $products->items();
            //  dd($products);
            if ($products->total() > 0 && isset($products->items()[0]) && $products->items()[0]->id) {
                $arr = [
                    'view' => view('template.partials.ajax.sectiongrid', compact('products', 'quantity'))->render(),
                    'selectedSort' => $sort,
                    //     'grid' => view('template.partials.ajax.product-grid', compact('products', 'quantity'))->render(),
                    //     'list' => view('template.partials.ajax.product-list', compact('products', 'quantity'))->render(),
                    // 'pagination_info' => $products->firstItem() . ' - ' . $products->lastItem() . ' de ' . $products->total() . ' Productos',

                ];
            } else {

                $arr = [
                    "view" => view('template.partials.notfound')->render(),

                ];
            }

            return response()->json($arr);
        } else {

            $query = Product::with("Ofert");

            if ($sub_slug != null) {
                $category = Category::where('slug', $sub_slug)->first();
                $query->where('sub_category_id', $category->id);
            } elseif ($slug != null) {
                $category = Category::where('slug', $slug)->first();
                $query->where('category_id', $category->id);
            }

            switch ($sort) {
                case 'Low - High Price':
                    $query->orderBy('price');
                    break;
                case 'High - Low Price':
                    $query->orderByDesc('price');
                    break;
                case 'A - Z Order':
                    $query->orderBy('name');
                    break;
                case 'Z - A Order':
                    $query->orderByDesc('name');
                    break;
                default:
                    $query->orderBy('id', 'asc');
            }
            $products = $query->paginate(2)->withQueryString();

            $quantity = $products->count();

            if ($request->category_id) {
                $arr = explode("-", $request->category_id);
                if (count($arr) > 1)
                    $id = $arr[0];
                else $id = $arr[0];
                $category = Category::find($id);
            } else
                $category = null;

            $search = $request->search;

            if ($request->ajax()) {

                $arr = [
                    'view' => view('template.partials.ajax.sectiongrid', compact('products', 'quantity'))->render(),
                    'selectedSort' => $sort,
                    // 'grid' => view('template.partials.ajax.product-grid', compact('products', 'quantity'))->render(),
                    // 'list' => view('template.partials.ajax.product-list', compact('products', 'quantity'))->render(),
                    // 'pagination_info' => $products->firstItem() . ' - ' . $products->lastItem() . ' de ' . $products->total() . ' Productos',

                ];

                return response()->json($arr);
            } else {

                return view('template.pages.product-grids', compact(
                    'commonInfo',
                    'products',
                    'category',
                    'search',
                    'quantity'
                ));
            }
        }
    }

    public function contactUs()
    {
        $commonInfo = $this->commonInfo();
        $contacts = Contact_information::get();
        return view('template.pages.contact', compact('commonInfo', 'contacts'));
    }

    public function productDetails(Request $request, $id)
    {

        $commonInfo = $this->commonInfo();
        $product = Product::find($id);

        $product->increment('views');

        $category = Category::with('subcategories')->where('parent_id', null)->get();

        $variaciones = $product->variation;
        $caracteristicas = $variaciones->first()->caracteristicas;

        $variations = DB::table("variations")
            ->join("characteristic_variation", "variations.id", "=", "characteristic_variation.variation_id")
            ->join("values", "characteristic_variation.value_id", "=", "values.id")
            ->select(
                'characteristic_variation.characteristic_id',
                DB::raw('MAX(characteristic_variation.id) as cvid'),
                DB::raw('MAX(variations.id) as max_id'),
                DB::raw('MAX(variations.stock) as max_stock'),
                DB::raw('MAX(values.name) as valuesname')
            )
            ->groupBy('characteristic_variation.characteristic_id')
            ->get();

        $firstVariation = $product->variation->first();

        $result = $firstVariation->characteristics->map(function ($char) use ($product) {
            $values = Value::join('characteristic_variation as cv', 'values.id', '=', 'cv.value_id')
                ->join('variations as v', 'v.id', '=', 'cv.variation_id')
                ->where('product_id', $product->id)
                ->where('cv.characteristic_id', $char->id)
                ->select('values.id', 'values.name')
                ->get()
                ->toArray();

            return [
                'id' => $char->id,
                'name' => $char->name,
                'values' => $values,
            ];
        });

        $result = collect($result)->keyBy('id')->toArray();
        // $product->variation()->with('characteristics')->get();

        // dd($product);


        $variaciones = $product->variation;
        // Obtén las características seleccionadas desde la solicitud AJAX
        $selectedCharacteristics = $request->input('selectedCharacteristics', []);

        // Filtra las variaciones según las características seleccionadas
        $filteredVariations = $variaciones->filter(function ($variation) use ($selectedCharacteristics) {
            $characteristics = $variation->characteristics->pluck('id')->toArray();
            return count(array_intersect($characteristics, $selectedCharacteristics)) === count($selectedCharacteristics);
        });

        // Obtén el stock de la variación filtrada o utiliza el stock de la primera variación como predeterminado
        $stock = $filteredVariations->isNotEmpty() ? $filteredVariations->first()->stock : $variaciones->first()->stock;

        // Devuelve el stock en la respuesta JSON

        if ($request->ajax()) {
            return response()->json(['stock' => $stock]);
        } else {
            return view('template.pages.product-details', compact(
                'commonInfo',
                'product',
                "category",
                "variations",
                "variaciones",
                "caracteristicas",
                'result',
                'stock'
            ));
        }
    }

    public function productStock(Request $request){
        dd($request->all());
    }

    public function Error()
    {
        $commonInfo = $this->commonInfo();
        $cat = Category::get();
        $parameters = Route::current()->parameters();
        if (isset($parameters["fallbackPlaceholder"]) && Str::is('admin/*', $parameters["fallbackPlaceholder"])) {
            return view('admin.404');
        } else {
            return view('template.pages.404', compact('commonInfo', 'cat'));
        }
    }

    private function commonInfo()
    {
        return [

            'contacts' => Contact_information::First(),
            'products' => Product::where('act_carusel', true)->get(),
            'productosMasVistos' => Product::orderByDesc('views')->take(8)->get(),
            'categories' =>  Category::with('subcategories')->where('parent_id', null)->get()
        ];
    }
}
