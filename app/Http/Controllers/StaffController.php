<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffRequest;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\Models\Image;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $staff = Staff::all();
        if ($request->ajax()) {
            return DataTables::of($staff)

                ->addColumn('image', function ($row) {
                    return '<img class="list-preview" src="/' . $row->image_url . '">';
                })
                ->addColumn('buttons', function ($row) {
                    return '
           <div class="input-group mb-3">
              <div class="input-group-prepend">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                  Action
                </button>
                <div class="dropdown-menu">
                    <button class="dropdown-item btn-modal" data-toggle="modal" data-target="#modal-generic" data-url="' . route('staff.edit', $row->id) . '">
                    <i class="fas fa-pencil-alt mr-1"></i><span class="">' . __('main.edit') . '</span></button>
                    <button type="button" class="dropdown-item delete" data-url="' . route('staff.destroy', $row->id) . '">
                    <i class="fas fa-trash-alt mr-1"></i><span class="">' . __('main.delete') . '</span></button>
                </div>
              </div>
            </div>';
                })
                ->rawColumns(['image', 'buttons'])
                ->make(true);
        }
        return view("staff.index", compact("staff"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $staff = Staff::all();
        return view('staff.create', compact("staff"))->render();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StaffRequest $request)
    {
        $staff = new Staff();
        $staff->name = $request->input('name');
        $staff->position = $request->input('position');
        $staff->facebook = $request->input('facebook');
        $staff->Twitter = $request->input('twitter');
        $staff->Instagram = $request->input('instagram');

        $staff->save();

        $image = $request->file('file');
       
        if ($image && $request->input('flag-file')) {
            $fileName = /* $staff->name . '_' . */ time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/staff', $fileName);

            $image = new Image([
                'url' => str_replace('public/', 'storage/', $path)
            ]);
            $staff->image()->save($image);
        }
        return redirect()->route('staff.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $staff= Staff::find($id);
        return view("staff.edit", compact("staff"))->render();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StaffRequest $request,$id)
    {
        try {
            $staff = Staff::find($id);                
            $staff->name = $request->input("name");
            $staff->position = $request->input('position');          
            $staff->facebook = $request->input('facebook');          
            $staff->twitter = $request->input('twitter');          
            $staff->instagram = $request->input('instagram');          
            $staff->save();
            $image = $request->file('file');
            $deleteImg = false;
       
            if($image){
                if($request->input('flag-file')){
                    $fileName = /* $staff->name . '_' . */ time() . '.' . $image->getClientOriginalExtension();  
                    $path = $image->storeAs('public/staff', $fileName); 
                    
                    if($staff->image){                    
                        $staff->image->update([
                            'url' => str_replace('public/', 'storage/' ,$path)
                        ]);
                    }
                    else{
                        $staff->image()->create([
                            'url' => str_replace('public/', 'storage/' ,$path)
                        ]);
                    }          
                } 
            } 
            else if($request->input('flag-file')) $deleteImg = true;   

            if($deleteImg && $staff->image){
                $staff->image->delete();
            }  
            
            $response = [
                'success' => true,
                'message' =>  __('main.staff_updated_successfully')
            ];
            DB::commit();
        
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'message' =>  __('main.error')
            ];
            DB::rollback();
            dd($e->getMessage());
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
            $staff = Staff::find($id);
            $staff->delete();
            if($staff->image)
                $staff->image->delete();
            DB::commit();
            $response = [
                'success' => true,
                'message' =>  __('main.staff_deleted_successfully')
            ];
        }
        catch (\Exception $e) {
            DB::rollback();
            $response = [
                'success' => false,
                'message' => __('main.error_staff')
            ];
        }
        return response()->json($response);   
    }
}
