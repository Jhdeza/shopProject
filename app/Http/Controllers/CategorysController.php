<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriesRequest;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CategorysController extends Controller
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
    public function store(CategoriesRequest $request)
    {
           

        $categories = new Category();
        $categories->description = $request->input("Categoria");
        if ($request->input("parent_id")) {
            $categories->parent_id = $request->input("parent_id");
        }
        $categories->save();
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
       
        return view("categories-crud.edit", compact("category","categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriesRequest $request,$id)
    {
        
        $categories = Category::find($id);
              
        $categories->description = $request->input("Categoria");
        $categories->parent_id = $request->input("parent_id");
        
        $categories->save();
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
