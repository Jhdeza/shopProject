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
                $sort = $request->input('sort');
                $query = Product::query();
                
                
                if ($category) {
                    $query->where('category_id', $category)->orWhere('sub_category_id', $category);
                }
            
                if ($filter) {
                    $query->where("name", 'like', '%' . $filter . '%');
            }
                           
            
            switch ($sort) {
                case 'Low - High Price':
                    $query->orderBy('price');
                    break;
                case 'High - Low Price':
                    $query->orderByDesc('price');
                    break;
                case 'A - Z Order':
                    $query->orderBy('name');
                    break;
                case 'Z - A Order':
                    $query->orderByDesc('name');
                    break;
                default:
                    
                    $query->orderBy('id', 'asc');
            }




            $products = $query->paginate(12)->withQueryString();
        
            $arr = [ 
                'grid' => view('template.partials.ajax.product-grid', compact('products'))->render(),
                'list' => view('template.partials.ajax.product-list', compact('products'))->render(),
            ];
        
            return response()->json($arr);
    }
          

        

}
