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
    public function productGrid(Request $request,)
    {
        $commonInfo = $this->commonInfo();
        $query = Product::with("Ofert") ;
        if ($request->input('category'))
            $query->where('category_id', $request->input('category'));
        if ($request->input('subcategory'))
            $query->where('sub_category_id', $request->input('subcategory'));
        $products = $query->get();

        return view('template.pages.product-grids', compact('commonInfo', 'products'));
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
            'categories' =>  Category::with('subcategories')->where('parent_id', null)->get()
        ];
    }
}
