<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client;
use App\Http\Requests\ClientRequest;
use App\Models\Client_information;

use Illuminate\Http\Request;

class ClientInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client_information::all();
        return view("cliente_crud.index", compact("clients"));
    }

public function create(){

    $client = Client_information::all();

}
    public function store(ClientRequest $request){
        
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
        $client = Client_information::find($id);
        $client->delete();
        return redirect()->route("client.index");
    }
}
