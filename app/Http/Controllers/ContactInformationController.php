<?php

namespace App\Http\Controllers;

use App\Models\Contact_information;
use Illuminate\Http\Request;

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

        $contact_information = Contact_information::find($id);
        $contact_information->fill($request->all());
        $contact_information->save();
        return redirect()->route("information.index");
    }
}
