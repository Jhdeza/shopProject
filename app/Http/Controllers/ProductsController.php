<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Ofert;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with(["category","ofert"])->get();
        return view("Products-crud.index", compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $oferts = Ofert::all();
       return view('Products-crud.create',compact("categories","oferts"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create($request->all());
        $product->act_carusel = $request->input('act_carusel') == "on" ?  true : false ;
        $product->is_new = $request->input('is_new') == "on" ?  true : false ;
        return redirect()->route("product.index");
    }

    /**
     * Display the specified resource.
     */
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $oferts = Ofert::all();
        return view("products-crud.edit", compact("product","categories","oferts"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        $product->fill($request->all());
        $product->act_carusel = $request->input('act_carusel') == "on" ?  true : false ;
        $product->is_new = $request->input('is_new') == "on" ?  true : false ;
        $product->save();
        return redirect()->route("product.index");    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route("product.index");
    }
}
