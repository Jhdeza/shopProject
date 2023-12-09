<?php

namespace App\Http\Controllers;

use App\Http\Requests\ofertRequest;
use App\Models\ofert;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class OfertController extends Controller
{
    public function index()
    {

        $oferts = ofert::all();
        return view("ofertas-crud.index", compact("oferts"));
    }
    // private function orderCategories($ofert)
    // {
    //     $parents = new Collection();
    //     $sons = $categories->filter(function ($el) {
    //         return $el->parent_id != null;
    //     });

    //     $categories->map(function ($cat) use ($sons, $parents) {
    //         if ($cat->parent_id == null) {
    //             $parents->push($cat);
    //             $sons->map(function ($elemento, $index) use ($cat, $parents, $sons) {
    //                 if ($elemento->parent_id == $cat->id) {
    //                     $parents->push($elemento);
    //                     $sons->forget($index);
    //                 }
    //             });
    //         }
    //     });
    //     return $parents;
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $oferts = ofert::all();
        return view("ofertas-crud.create", compact("oferts"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ofertRequest $request)
    {
      
        $oferts = new ofert();
        $oferts->name = $request->input("nombre");
        $oferts->percet = $request->input("descuento");
        $fechas= $request->input("fechas");
        $fechasseparadas= explode("-", $fechas);
        
        
        $oferts->date_ini = Carbon::createFromFormat('m/d/Y', trim($fechasseparadas[0]))->format('Y-m-d');
        $oferts->date_end = Carbon::createFromFormat('m/d/Y', trim($fechasseparadas[1]))->format('Y-m-d');

        $oferts->active = $request->input('my-checkbox') == "on" ?  true : false ;
        $oferts->save();
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

         $ofert = ofert::find($id);
        
         $date_in=  Carbon::parse($ofert->date_ini)->format('m/d/Y');
         $date_end=  Carbon::parse($ofert->date_end)->format('m/d/Y');
         $ofert->range = $date_in." - ".$date_end;
        //  $ofert = ofert::where('name', null)->where('id','<>',$ofert->id)->get();
        return view("ofertas-crud.edit", compact("ofert"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ofertRequest $request, $id)
    {

         $ofert = ofert::find($id);

         $ofert->name = $request->input("nombre");
         $ofert->percet = $request->input("descuento");
         $fechas= $request->input("fechas");
         $fechasseparadas= explode("-", $fechas);
         $ofert->date_ini = Carbon::createFromFormat('m/d/Y', trim($fechasseparadas[0]))->format('Y-m-d');
         $ofert->date_end = Carbon::createFromFormat('m/d/Y', trim($fechasseparadas[1]))->format('Y-m-d');
         $ofert->active = $request->input('my-checkbox') == "on" ?  true : false ;

         $ofert->save();
        return redirect()->route("ofert.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $ofert = ofert::find($id);
        $ofert->delete();
        return redirect()->route("ofert.index");
    }
}
