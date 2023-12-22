<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class SearchController extends Controller
{
  public function category(Request $request){
    
    $catg = $request->get("catg");
    $querys = Category::where("name", 'like','%' . $catg . '%')->get();
    
    $data = [];
    foreach($querys as $query){
     $data[] = [
        'label'=> $query->name
     ];
        
    }
    return $data;
  }
}
