<?php

namespace App\Http\Controllers;

use App\Http\Requests\ofertRequest;
use App\Models\Ofert;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class OfertController extends Controller
{
    public function index()
    {

        $oferts = Ofert::all();
        return view("ofertas-crud.index", compact("oferts"));
    }   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("ofertas-crud.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ofertRequest $request)
    {      
        $ofert = new Ofert();
        $ofert->name = $request->input("nombre");
        $ofert->percet = $request->input("descuento");
        $fechas= $request->input("fechas");
        $fechasseparadas= explode("-", $fechas);        
        
        $ofert->date_ini = Carbon::createFromFormat('d/m/Y', trim($fechasseparadas[0]))->format('Y-m-d');
        $ofert->date_end = Carbon::createFromFormat('d/m/Y', trim($fechasseparadas[1]))->format('Y-m-d');
        $ofert->active = $request->input('active') == "on" ?  true : false ;
        $ofert->save();
        return redirect()->route('ofert.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ofert $ofert)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ofert = Ofert::find($id);
        $date_in=  Carbon::parse($ofert->date_ini)->format('d/m/Y');
        $date_end=  Carbon::parse($ofert->date_end)->format('d/m/Y');
        $ofert->range = $date_in." - ".$date_end;
            
        return view("ofertas-crud.edit", compact("ofert"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OfertRequest $request, $id)
    {
        $ofert = Ofert::find($id);
        $ofert->name = $request->input("nombre");
        $ofert->percet = $request->input("descuento");
        $fechas= $request->input("fechas");
        $fechasseparadas= explode("-", $fechas);
        $ofert->date_ini = Carbon::createFromFormat('d/m/Y', trim($fechasseparadas[0]))->format('Y-m-d');
        $ofert->date_end = Carbon::createFromFormat('d/m/Y', trim($fechasseparadas[1]))->format('Y-m-d');
        $ofert->active = $request->input('active') == "on" ?  true : false ;

        $ofert->save();
        return redirect()->route("ofert.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ofert = Ofert::find($id);
        $ofert->delete();
        return redirect()->route("ofert.index");
    }
}
