<?php

namespace App\Http\Controllers;

use App\Models\Contact_information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Image;

class ContactInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $contacts_information = Contact_information::First();
        return view("information-crud.edit", compact("contacts_information"));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        
        $contacts_information = Contact_information::find($id);
        $contacts_information->fill($request->all());
        $contacts_information->save();
        $image = $request->file('file');
        $deleteImg = false;
   
        if($image){
           
                if($request->input('flag-file')){
                    $fileName = /* $staff->name . '_' . */ time() . '.' . $image->getClientOriginalExtension();  
                    $path = $image->storeAs('public/Logo', $fileName); 
                    
                    if($contacts_information->image){                    
                        $contacts_information->image->update([
                            'url' => str_replace('public/', 'storage/' ,$path)
                        ]);
                    }
                    else{
                        $contacts_information->image()->create([
                            'url' => str_replace('public/', 'storage/' ,$path)
                        ]);
                    }          
                } 
            } 
            else if($request->input('flag-file')) $deleteImg = true;   
            
            if($deleteImg && $contacts_information->image){
                $contacts_information->image->delete();
            }  
            
                       
        
        return redirect()->route("information.index");
    }
    
    }

