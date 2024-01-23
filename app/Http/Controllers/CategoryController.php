<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::select([
            'name','slug', 'categories.id', 'parent_id'
        ])
        ->groupBy('categories.id');
        $categories = $categories->get();
        $categories = $this->orderCategories($categories);

        if($request->ajax()){
            return Datatables::of($categories)
            ->editColumn('name', function ($row) {
                if ($row->parent_id != null) {
                    return '<span class="pl-5">--' . $row->name.'</span>';
                } else {
                    return $row->name;
                }
            })
            ->addColumn('image', function($row){
             
                    return '<img class="list-preview" src="/'. $row->image_url .'">';
            })
            ->addColumn('buttons', function($row){
               return '
               <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                      Action
                    </button>
                    <div class="dropdown-menu">
                        <button class="dropdown-item btn-modal" data-toggle="modal" data-target="#modal-generic" data-url="'. route('category.edit', $row->id) .'">
                        <i class="fas fa-pencil-alt mr-1"></i><span class="">'. __('main.edit') .'</span></button>
                        <button type="button" class="dropdown-item delete" data-url="'. route('category.destroy', $row->id) .'">
                        <i class="fas fa-trash-alt mr-1"></i><span class="">'. __('main.delete') .'</span></button>
                    </div>
                  </div>
                </div>';
            })
            ->rawColumns(['image', 'buttons', 'name'])
            ->make(true);
        }

        return view("categories.index"/* , compact("categories") */);
    }
    
    private function orderCategories($categories)
    {
        $parents = new Collection();
        $sons = $categories->filter(function ($el) {
            return $el->parent_id != null;
        });

        $categories->map(function ($cat) use ($sons, $parents) {
            if ($cat->parent_id == null) {
                $parents->push($cat);
                $sons->map(function ($elemento, $index) use ($cat, $parents, $sons) {
                    if ($elemento->parent_id == $cat->id) {
                        $parents->push($elemento);
                        $sons->forget($index);
                    }
                });
            }
        });
        return $parents;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('parent_id', null)->get();
        return view("categories.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        try{
            DB::beginTransaction();
            $category = new Category();
            $file = $request->file('file');
          
            $category->name = $request->input("name");
            if ($request->input("parent_id")) {
                $category->parent_id = $request->input("parent_id");
            }
            $category->slug = $request->input("slug");
            $category->save();

            $image = $request->file('file');
            if($image && $request->input('flag-file')){
                $fileName = $category->name . '_' . time() . '.' . $image->getClientOriginalExtension();  
                $path = $image->storeAs('public/categories', $fileName); 
                
                $image = new Image([
                    'url' => str_replace('public/', 'storage/' ,$path)
                ]);
                $category->image()->save($image);
            }
        
            $response = [
                'success' => true,
                'message' =>  __('main.category_created_successfully')
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

       public function edit($id)
    {
        
        $category = Category::find($id);
        $categories = Category::where('parent_id', null)->where('id','<>',$category->id)->get();        
        return view("categories.edit", compact("category","categories"));
    }

    
    public function update(CategoryRequest $request,$id)
    {
        try {
            $category = Category::find($id);   
            $category->name = $request->input("name");
            $category->slug=$request->input("slug");   
            $category->parent_id = $request->input('is_sub')?$request->input("parent_id"):null;            
            $category->save();
            $image = $request->file('file');
            $deleteImg = false;
       
            if($image){
                if($request->input('flag-file')){
                    $fileName = $category->description . '_' . time() . '.' . $image->getClientOriginalExtension();  
                    $path = $image->storeAs('public/categories', $fileName); 
                    
                    if($category->image){                    
                        $category->image->update([
                            'url' => str_replace('public/', 'storage/' ,$path)
                        ]);
                    }
                    else{
                        $category->image()->create([
                            'url' => str_replace('public/', 'storage/' ,$path)
                        ]);
                    }          
                } 
            } 
            else if($request->input('flag-file')) $deleteImg = true;   

            if($deleteImg && $category->image){
                $category->image->delete();
            }  
            
            $response = [
                'success' => true,
                'message' =>  __('main.category_updated_successfully')
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
            $category = Category::find($id);
            $category->delete();
            if($category->image)
                $category->image->delete();
            DB::commit();
            $response = [
                'success' => true,
                'message' =>  __('main.category_deleted_successfully')
            ];
        }
        catch (\Exception $e) {
            DB::rollback();
            $response = [
                'success' => false,
                'message' =>  $e->errorInfo[1] == 1451?__('main.category_used_by_products'):__('main.error')
            ];
        }
        return response()->json($response);    
    }
}
