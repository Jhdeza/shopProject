<?php

namespace App\Http\Controllers;

use App\Models\aboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $about = aboutUs::First();
        return view("aboutUs.edit", compact("about"));
    }

    
    public function update(Request $request, $id)
    {
        $about = aboutUs::find($id);
        $about->fill($request->all());
        $about->save();
        return redirect()->route("about-us.index");
    }

    
}
