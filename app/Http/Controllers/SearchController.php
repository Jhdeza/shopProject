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
        $products = $query->paginate();
        
        $arr=[
            'grid' => view('template.partials.ajax.product-grid', compact('products'))->render(),
            'list' => view('template.partials.ajax.product-list', compact('products'))->render(),
        ];
     
        return response()->json($arr);

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
