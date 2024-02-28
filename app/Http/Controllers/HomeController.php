<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
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
use Illuminate\Support\Facades\Lang;






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
        $catVistas = Category::where('parent_id', null )->orderByDesc('views')
        
        ->get();
       
        return view('template.pages.home', compact('commonInfo', 'cat',"catVistas"));
    }
    public function about()
    {
        $commonInfo = $this->commonInfo();
        $abouts = AboutUs::get();
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
            
            $products = $query->where('prod_actv',1)->paginate(12)->withQueryString();
           
            $quantity = $products->items();

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
            
            $products = $query->where('prod_actv',1)->paginate(12)->withQueryString();
            
            $quantity = $products->count();
            
            if($category){
    
                if ($category->parent ){
                    $category->parent->increment("views");
                }
                $category->increment('views');
            }
            
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
        
        $firstVariation = $product->variation->first();
        $result = null;
        $soldOut = false;
        if ($product->type == 'VARIABLE') {
            $result = $firstVariation->characteristics->map(function ($char) use ($product) {
                $values = Value::join('characteristic_variation as cv', 'values.id', '=', 'cv.value_id')
                    ->join('variations as v', 'v.id', '=', 'cv.variation_id')
                    ->where('product_id', $product->id)
                    ->where('cv.characteristic_id', $char->id)
                    ->select(DB::raw('MAX(values.id) AS id'), DB::raw('MAX(values.name) AS name'), DB::raw('MAX(v.price) as price'))
                    ->groupBy('values.id')
                    ->get()
                    ->toArray();
                    
                return [
                    'id' => $char->id,
                    'name' => $char->name,
                    'values' => $values,
                ];
            });

            $result = collect($result)->keyBy('id')->toArray();

           
        
        }
        $stock = $product->quantity;
        
        if ($stock > $product->quantity_alert)
            $stock = trans('main.stock');
        else if ($stock === 0) {
            $soldOut = true;
            $stock = trans('main.soldout');
        }
        else if($stock < $product->quantity_alert){
            $stock = $product->quantity;

        }



        return view('template.pages.product-details', compact(
            'commonInfo',
            'product',
            "category",
            "variaciones",
            "result",
            'stock',
            'soldOut'
        ));
    }


    public function productStock(Request $request, Product $product)
    {
        $values = $request->values;
        $query = $product->variation()->join('characteristic_variation as vc', 'vc.variation_id', '=', 'variations.id');
        $stock = 0;
        $price = 0;
        $title = trans('main.stock1');
        $soldOut = false;

        if ($values) {
            $query = DB::table('variations as v')
            ->join('characteristic_variation as cv', 'v.id', '=', 'cv.variation_id')
            ->select('v.id', 'v.price', DB::raw('MAX(v.stock) as stock'), DB::raw('COUNT(*) as total'))
            ->where('v.product_id', $product->id);
       
            $query->where(function($query) use($values){
                foreach ($values as $value) {
                    list($characteristic_id, $value_id) = explode('-', $value[0]);
                    $query->orWhere(function($query1) use($characteristic_id, $value_id){
                        $query1->where('cv.characteristic_id', $characteristic_id)
                            ->where('cv.value_id', $value_id);
                    });
                }
            });
            
            $query->groupBy('v.id')
            ->having('total', count($values));

           $result = $query
          
            ->get();
            
         $resultSend = new \stdClass();
         $resultSend->stock = 0;
         $resultSend->min_price = 999999;
         foreach($result as $row){
            $resultSend->stock += $row->stock;
            if($resultSend->min_price > $row->price)
                $resultSend->min_price = $row->price;
         }
        
        }
        if ($resultSend && $resultSend->stock != 0){
            $stock = $resultSend->stock;
            $price ='$'. number_format($resultSend->min_price, 2, '.', '');
        }else
        $price = '0.00 $';
      

        if ($stock == 0) {
            $soldOut = true;
            $stock = trans('main.soldout');
        }        
        else if ($stock > $product->quantity_alert) {
            $title = trans('main.stock1');
            $stock = trans('main.stock');
      }
   
        return response()->json(['stock' => $stock, 'price'=>$price, 'title' => $title, 'soldOut' => $soldOut]);
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
