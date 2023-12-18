<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Ofert;
use App\Models\Image;
use Illuminate\Support\Facades\DB;

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
        try {
            DB::beginTransaction();
            $productData = $request->all();
            $productData['act_carusel'] = $request->input('act_carusel') == "on" ?  true : false ;
            $productData['is_new'] = $request->input('is_new') == "on" ?  true : false ;
            $product = Product::create($productData);
            $files = [];

            if($request->hasFile('galery')){
                $discart = explode(",", $request->input('mirror_hidden_galery'));
                foreach($request->file('galery') as $image){
                    if(in_array($image->getClientOriginalName(), $discart))
                        continue;
                    $fileName = 'p_' . $product->id . '_' . time().rand(1, 100) . '.' . $image->getClientOriginalExtension();
                    $path = $image->storeAs('public/products', $fileName);
                    $files[] =[
                        'url' => str_replace('public/', 'storage/' ,$path)
                    ];

                }
                $product->galery()->createMany($files);
            }
            DB::commit();
            $msg = __('main.product_created_successfully');
        } catch (\Exception $e) {
            DB::rollback();
            $msg = __('main.error');
        }
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
        //dd($request->all());
        //dd($request->allFiles());
        try {
            DB::beginTransaction();
            $product = Product::find($id);
            $product->fill($request->all());
            $product->act_carusel = $request->input('act_carusel') == "on" ?  true : false ;
            $product->is_new = $request->input('is_new') == "on" ?  true : false ;
            $product->save();
            $files = [];

            if($request->input('mirror_hidden_file_galery')){
                foreach(explode(",", $request->input('mirror_hidden_file_galery')) as $delete)
                    Image::find($delete)->delete();
            }

            if($request->hasFile('galery')){
                $discart = explode(",", $request->input('mirror_hidden_galery'));
                foreach($request->file('galery') as $image){
                    if(in_array($image->getClientOriginalName(), $discart))
                        continue;
                    $fileName = 'p_' . $product->id . '_' . time().rand(1, 100) . '.' . $image->getClientOriginalExtension();
                    $path = $image->storeAs('public/products', $fileName);
                    $files[] =[
                        'url' => str_replace('public/', 'storage/' ,$path)
                    ];

                }
                $product->galery()->createMany($files);
            }
            DB::commit();
            $msg = __('main.product_created_successfully');
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
            $msg = __('main.error');
        }
        return redirect()->route("product.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $product = Product::find($id);
            $product->delete();
            foreach($product->galery as $img)
                $img->delete();
            DB::commit();
            $msg = __('main.product_deleted_successfully');
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
            $msg = __('main.error');
        }

        return redirect()->route("product.index")->with($msg);
    }
}
