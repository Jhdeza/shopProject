<?php

namespace App\Http\Controllers;

use App\Models\aboutUs;
use App\Models\Category;
use App\Models\Contact_information;
use App\Models\Product;
use App\Models\Staff;
use Illuminate\Http\Request;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $commonInfo = $this->commonInfo();
        return view('template.pages.home', compact('commonInfo'));
    }
    public function about()
    {
        $commonInfo = $this->commonInfo();
        $abouts = aboutUs::get();
        $staffs = Staff::get();
        return view('template.pages.about-us', compact('commonInfo','abouts',"staffs"));
    }
    public function productGrid(Request $request, $slug = null, $sub_slug = null)
{
   
    $commonInfo = $this->commonInfo();
    $query = Product::with("Ofert");
  
   if ($sub_slug!= null) {
        $category = Category::where('slug', $sub_slug)->first();
        $query->where('sub_category_id', $category->id);

    } elseif ($slug!= null) {
        $category = Category::where('slug', $slug)->first();
        $query->where('category_id', $category->id);
    }
   $products = $query->paginate(9)->withQueryString();
   
   if($request->ajax()){
        $arr=[ 
            'grid' => view('template.partials.ajax.product-grid', compact('products'))->render(),
            'list' => view('template.partials.ajax.product-list', compact('products'))->render(),
            // 'pagination' => $products->links()->toHtml(),
        ]; 
    
        return response()->json($arr);
   }

   if($request->category_id){
        $arr = explode("-", $request->category_id);
        if(count($arr)> 1)
            $id = $arr[0];
        else $id = $arr[0];
        $category = Category::find($id);
   }
   else
        $category = null;
    $search = $request->search;
    

    return view('template.pages.product-grids', compact('commonInfo', 'products','category', 'search'));
}
       public function contactUs()
    {
        $commonInfo = $this->commonInfo();
        $contacts = Contact_information::get();
        return view('template.pages.contact', compact('commonInfo', 'contacts'));
    }

    public function productDetails($id,)
    {

        $commonInfo = $this->commonInfo();
        $product = Product::find($id);
     
        $product->increment('views');
        return view('template.pages.product-details', compact('commonInfo', 'product'));
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
