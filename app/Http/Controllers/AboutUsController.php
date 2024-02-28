<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutUsRequest;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $about = AboutUs::First();
        return view("aboutUs.edit", compact("about"));
    }
    public function store(AboutUsRequest $request){
        $about = new aboutUs();
        $about->fill($request->all());
        $about->save();

        $image = $request->file('file');
        $deleteImg = false;
   
        if($image){
           
                if($request->input('flag-file')){
                    $fileName = /* $staff->name . '_' . */ time() . '.' . $image->getClientOriginalExtension();  
                    $path = $image->storeAs('public/about', $fileName); 
                    
                    if($about->image){                    
                        $about->image->update([
                            'url' => str_replace('public/', 'storage/' ,$path)
                        ]);
                    }
                    else{
                        $about->image()->create([
                            'url' => str_replace('public/', 'storage/' ,$path)
                        ]);
                    }          
                } 
            } 
            else if($request->input('flag-file')) $deleteImg = true;   
            
            if($deleteImg && $about->image){
                $about->image->delete();
            }  
        return redirect()->route("about-us.index");

    }
    
    public function update(AboutUsRequest $request, $id)
    {
        $about = aboutUs::find($id);
        $about->fill($request->all());
        $about->save();
        $image = $request->file('file');
        $deleteImg = false;
        
        if($image){
           
                if($request->input('flag-file')){
                    $fileName = /* $staff->name . '_' . */ time() . '.' . $image->getClientOriginalExtension();  
                    $path = $image->storeAs('public/about', $fileName); 
                    
                    if($about->image){                    
                        $about->image->update([
                            'url' => str_replace('public/', 'storage/' ,$path)
                        ]);
                    }
                    else{
                        $about->image()->create([
                            'url' => str_replace('public/', 'storage/' ,$path)
                        ]);
                    }          
                } 
            } 
            else if($request->input('flag-file')) $deleteImg = true;   
            
            if($deleteImg && $about->image){
                $about->image->delete();
            }  

        return redirect()->route("about-us.index");
    }

    
}
