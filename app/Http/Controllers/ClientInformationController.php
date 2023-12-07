<?php

namespace App\Http\Controllers;

use App\Models\client_information;
use Illuminate\Http\Request;

class ClientInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client_information = client_information::all();    
        return view("", compact(""));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(client_information $client_information)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(client_information $client_information)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, client_information $client_information)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(client_information $client_information)
    {
        //
    }
}
