<?php

namespace App\Http\Controllers;


use App\Http\Requests\ClientRequest;
use App\Models\Client_information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;


class ClientInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $clients = Client_information::all();
        if ($request->ajax()) {
            return DataTables::of($clients)

                ->editColumn('reading', function ($row) {
                    if ($row->reading == 1)
                        return __('main.stade1');
                    else
                        return __('main.stade2');
                })
                    ->addColumn('clientmessage',function ($row){
                        return '
                        <div  style="max-width: 150px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                "'. $row->message .'" </div> 
                        ';

                    })


                ->addColumn('buttons', function ($row) {
                    return '
               <button type="buttom"class="btn btn-default btn-sm mr-2 editState" 
               data-url="' . route('client.update', $row->id) . '">
                        <i class="fas fa--alt mr-1"></i>
                        ' . ($row->reading == 0 ? __('main.change_state') : __('main.change_state2')) . '
                    </button>

                    <button type="button" class="btn btn-info btn-sm mr-2  " data-toggle="modal" data-target="#message_modal"
                    data-url="' . route('client.show', $row->id) . '">
                        <i class="fas fa-info mr-1"></i>' . __('main.View_message') . '</button>     

                     

                        <button type="button" class="btn btn-danger btn-sm delete" data-url="' . route('client.destroy', $row->id) . '">
                            <i class="fas fa-trash-alt mr-1"></i>' . __('main.delete') . '
                        </button> ' ;
                })

                ->rawColumns(['buttons','clientmessage'])

                ->make(true);
            }
            return view("cliente_crud.index", compact("clients"));
        
    }

    public function create()
    {

        $client = Client_information::all();
    }
    public function store(ClientRequest $request)
    {

        $client = new Client_information();
        $client->name = $request->input('name');
        $client->email_address = $request->input('email');
        $client->client_phone = $request->input('phone');
        $client->message = $request->input('message');
        $client->save();
        return redirect()->route('contact-us');
    }

    public function update(ClientRequest $request, $id)
    {

        $client = Client_information::find($id);
        $client->reading = !$client->reading;
        $client->save();

        return response()->json(['success' => true, 'client' => $client]);
    }




    public function show($id)
    {

        $client = Client_information::find($id);
        return response()->json($client);
    }


    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $client = Client_information::find($id);
            $client->delete();           
            DB::commit();
            $response = [
                'success' => true,
                'message' =>  __('main.message_deleted_successfully')
            ];
        }
        catch (\Exception $e) {
            DB::rollback();
            $response = [
                'success' => false,
                'message' => __('main.error')
            ];
        }
        return response()->json($response); 
    }
}
