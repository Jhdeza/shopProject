<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class SearchController extends Controller
{
    public function category(Request $request)
    {

        $filter = $request->input('filter');
        $category = $request->input('category');
        $query = Product::query();
        if ($category)
            $query->where('category_id', $category)->orWhere('sub_category_id', $category);
        if ($filter)
            $query->where("name", 'like', '%' . $filter . '%');
        $result = $query->get();
        

        $view = view('template.partials.ajax.product-grid', compact('result'))->render();
     
        return response()->json(['html' => $view]);

        // $catg = $request->get("catg");
        // $querys = Category::where("name", 'like','%' . $catg . '%')->get();

        // $data = [];
        // foreach($querys as $query){
        //  $data[] = [
        //     'label'=> $query->name
        //  ];

        // }
        // return $data;
    }
}
