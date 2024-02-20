<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Ofert;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ProductsController extends Controller
{

    public function __construct()
{
    $this->middleware('web');
}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        // $products = Product::with(["category","ofert"])->get();
        $products = Product::join('categories as c', 'c.id' , '=' , 'products.category_id')
                        ->leftJoin('categories as sub', 'sub.id', "=", 'products.sub_category_id')
                        ->leftJoin('oferts as o', 'o.id', "=", 'products.ofert_id')
                        ->select(
                            'products.id',
                            'products.name',
                            'products.price',
                            'products.quantity',
                            'products.quantity_alert',
                            'products.is_new',
                            'products.act_carusel',
                            'c.name as category',
                            'sub.name as sub_category',
                            'o.name as ofert',
                            'products.prod_actv',
                        )->get();
        if($request->ajax()){
            return Datatables::of($products)
            ->addColumn('image', function($row){
                return '<img class="list-preview" src="/'. $row->image .'">';
            })
            ->addColumn('buttons', function($row){
               return '
               <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                      Action
                    </button>
                    <div class="dropdown-menu">
                        <button class="dropdown-item btn-modal" data-toggle="modal" data-target="#modal-generic" data-url="'. route('product.edit', $row->id) .'">
                        <i class="fas fa-pencil-alt mr-1"></i><span class="">'. __('main.edit') .'</span></button>
                       
                    </div>
                  </div>
                </div>';
            })
            // <button type="button" class="dropdown-item delete" data-url="'. route('product.destroy', $row->id) .'">
            // <i class="fas fa-trash-alt mr-1"></i><span class="">'. __('main.delete') .'</span></button>
            ->editColumn('is_new', function($row){
                return $row->is_new?__('main.yes'):__('main.no');
            })
            ->editColumn('act_carusel', function($row){
                return $row->act_carusel?__('main.yes'):__('main.no');
            })
            ->editColumn('prod_actv', function($row){
                return $row->prod_actv?__('main.yes'):__('main.no');
            })
            ->editColumn('category', function($row){
                if($row->sub_category){
                    return $row->category. '<br>' .$row->sub_category;
                }
                return $row->category;
            })
            ->rawColumns(['image', 'buttons', 'category'])
            ->make(true);
        }
        return view("products.index", compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $oferts = Ofert::all();
        return view('products.create',compact("categories","oferts"))->render();
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
            $cats = explode('-', $productData['category_id']);
            
            if(count($cats) == 2){
                $productData['sub_category_id'] = $cats[0];
                $productData['category_id'] = $cats[1];
            }
            
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
                        'url' => str_replace('public/', 'storage/' ,$path),
                        'is_main' => $request->input('pre_hidden_galery') == $image->getClientOriginalName()?true:false
                    ];
                }
                $product->galery()->createMany($files);
            }
           
            $response = [
                'success' => true,
                'message' =>  __('main.product_created_successfully')
            ];
            DB::commit();
            

        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'message' =>  __('main.error')
            ];
            DB::rollback();

        }

        
        return response()->json($response);
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
        //$categories = Category::all();
        $oferts = Ofert::all();
        return view("products.edit", compact("product"/*,"categories"*/,"oferts"))->render();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $product = Product::find($id);
            $cats = explode('-', $request->category_id);
            if(count($cats) == 2){
                $request->merge([
                    'sub_category_id' => $cats[0],
                    'category_id' => $cats[1]
                ]);
            }
            else{
                $request->merge([
                    'sub_category_id' => null
                ]);
            }
            $product->fill($request->all());
            $product->act_carusel = $request->input('act_carusel') == "on" ?  true : false ;
            $product->is_new = $request->input('is_new') == "on" ?  true : false ;
            $product->prod_actv = $request->input('prod_actv') == "on" ?  true : false ;
            $product->save();
            $files = [];

            if($request->input('mirror_hidden_file_galery')){
                foreach(explode(",", $request->input('mirror_hidden_file_galery')) as $delete)
                    Image::find($delete)->delete();
            }

            if(is_numeric($request->input('pre_hidden_galery'))){
                $product->setMainImage($request->input('pre_hidden_galery'));
            }
            else if($request->input('pre_hidden_galery')){
                $main = $product->getMainImage();
                if($main)
                    $main->update(['is_main' => false]);
            }

            if($request->hasFile('galery')){
                $discart = explode(",", $request->input('mirror_hidden_galery'));
                foreach($request->file('galery') as $image){
                    if(in_array($image->getClientOriginalName(), $discart))
                        continue;
                    $fileName = 'p_' . $product->id . '_' . time().rand(1, 100) . '.' . $image->getClientOriginalExtension();
                    $path = $image->storeAs('public/products', $fileName);
                    $files[] =[
                        'url' => str_replace('public/', 'storage/' ,$path),
                        'is_main' => $request->input('pre_hidden_galery') == $image->getClientOriginalName()?true:false
                    ];
                }
                $product->galery()->createMany($files);
            }
            $response = [
                'success' => true,
                'message' =>  __('main.product_updated_successfully')
            ];
            DB::commit();
        } catch (\Exception $e) {
           
            $response = [
                'success' => false,
                'message' =>  __('main.error')
            ];
            DB::rollback();
        }
        return response()->json($response);
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
            $response = [
                'success' => true,
                'message' =>  __('main.product_deleted_successfully')
            ];
        } catch (\Exception $e) {
            DB::rollback();
            $response = [
                'success' => false,
                'message' =>  __('main.error')
            ];
        }

        return response()->json($response);
    }
}
