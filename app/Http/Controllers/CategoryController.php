<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = Category::select([
            'description', 'categories.id', 'parent_id'
        ])
            ->groupBy('categories.id');
        $categories = $categories->get();
        $categories = $this->orderCategories($categories);

        return view("categories-crud.list", compact("categories"));
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
        return view("categories-crud.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $category = new Category();
        $file = $request->file('file');
        
        $category->description = $request->input("category");
        if ($request->input("parent_id")) {
            $category->parent_id = $request->input("parent_id");
        }
        $category->save();

        $image = $request->file('file');
        if($image && $request->input('img-flag')){
            $fileName = $category->description . '_' . time() . '.' . $image->getClientOriginalExtension();  
            $path = $image->storeAs('public/categories', $fileName); 
            
            $image = new Image([
                'url' => str_replace('public/', 'storage/' ,$path)
            ]);
            $category->image()->save($image);
        }
        
        
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(category $categorys)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
        $category = Category::find($id);
        $categories = Category::where('parent_id', null)->where('id','<>',$category->id)->get(); 
        //dd($category->image->url);     
       
        return view("categories-crud.edit", compact("category","categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request,$id)
    {
        
        $category = Category::find($id);
              
        $category->description = $request->input("category");
        $category->parent_id = $request->input('is_sub')?$request->input("parent_id"):null;
        
        $category->save();

        $image = $request->file('file');
        $deleteImg = false;
       
        if($image){
            if($request->input('img_flag')){
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
        else if($request->input('img_flag')) $deleteImg = true;   

        if($deleteImg && $category->image){
            $category->image->delete();
        }      

        return redirect()->route("category.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       
        $categories = Category::find($id);
        $categories->delete();
        return redirect()->route("category.index");
    }
}
