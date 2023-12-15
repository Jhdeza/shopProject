<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
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
       return view('template.pages.about-us',compact('commonInfo'));
    }
    public function productGrid()
    {
        $commonInfo = $this->commonInfo();
        $products = Product::with("ofert")->get();
       return view('template.pages.product-grids',compact('commonInfo','products'));
    }

    private function commonInfo(){
        return [ 
            
            'products'=> Product::where('act_carusel',true)->get(),
            'categories' =>  Category::with('subcategories')->where('parent_id', null)->get() 
        ];
    }

}
