<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfertRequest;
use App\Models\Ofert;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class OfertController extends Controller
{
    public function index(Request $request)
    {

        $oferts = Ofert::all();
        if($request->ajax()){
            return DataTables::of($oferts)
            ->editColumn('percent', function($row){
                return $row->percent.'%';
            })
            ->editColumn('date_ini', function($row){
                return $row->date_ini->format('d/m/Y');
            })
            ->editColumn('date_end', function($row){
                return $row->date_end->format('d/m/Y');
            })
            ->editColumn('active', function($row){
                if ($row->active == 1)
                    return __('main.active');
                else 
                    return __('main.inactive');
            })
            ->addColumn('buttons', function($row){
               return '
               <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                      Action
                    </button>
                    <div class="dropdown-menu">
                        <button class="dropdown-item btn-modal" data-toggle="modal" data-target="#modal-generic" data-url="'. route('ofert.edit', $row->id) .'">
                        <i class="fas fa-pencil-alt mr-1"></i><span class="">'. __('main.edit') .'</span></button>
                        <button type="button" class="dropdown-item delete" data-url="'. route('ofert.destroy', $row->id) .'">
                        <i class="fas fa-trash-alt mr-1"></i><span class="">'. __('main.delete') .'</span></button>
                    </div>
                  </div>
                </div>';
            })
            ->rawColumns(['percent', 'buttons', 'date_ini', 'date_end', 'active'])
            ->make(true);
        }
        return view("oferts.index", compact("oferts"));
    }   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("oferts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OfertRequest $request)
    {   
        try {
            DB::beginTransaction();
            $splitDates= explode("-", $request->dates);        
            $request->merge([
                "date_ini" => Carbon::createFromFormat('d/m/Y', trim($splitDates[0]))->format('Y-m-d'),
                "date_end" => Carbon::createFromFormat('d/m/Y', trim($splitDates[1]))->format('Y-m-d'),
                "active" => $request->input('active') == "on" ?  true : false
            ]);
            $ofert = Ofert::create($request->except('_token'));

            $response = [
                'success' => true,
                'message' =>  __('main.ofert_created_successfully')
            ];
            DB::commit();

        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'message' =>  __('main.error')
            ];
            DB::rollback();

        }
        return response()->json($response);
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
            
        return view("oferts.edit", compact("ofert"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OfertRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $ofert = Ofert::find($id);
            $splitDates= explode("-", $request->dates);
            $request->merge([
                "date_ini" => Carbon::createFromFormat('d/m/Y', trim($splitDates[0]))->format('Y-m-d'),
                "date_end" => Carbon::createFromFormat('d/m/Y', trim($splitDates[1]))->format('Y-m-d'),
                "active" => $request->input('active') == "on" ?  true : false
            ]);

            $ofert->fill($request->all())->save();
            $response = [
                'success' => true,
                'message' =>  __('main.ofert_updated_successfully')
            ];
            DB::commit();

        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'message' =>  __('main.error')
            ];
            DB::rollback();

        }
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $ofert = Ofert::find($id);
            $ofert->delete();
            if($ofert->image)
                $ofert->image->delete();
            DB::commit();
            $response = [
                'success' => true,
                'message' =>  __('main.ofert_deleted_successfully')
            ];
        }
        catch (\Exception $e) {
            DB::rollback();
            $response = [
                'success' => false,
                'message' => __('main.error_ofert')
            ];
        }
        return response()->json($response);   
    }
}
