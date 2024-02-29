<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class MyUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view("user-crud.index",  compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view("user-crud.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $post = User::create([
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'password'=> bcrypt($request->input('password')),
        ]);
        return redirect()->route('my-user.index');
    }

 
  
    public function edit($id)
    {
        
        $user = User::find($id);
        return view("user-crud.edit", compact("user"));
    }

  
    public function update(Request $request, $id)
    {
        
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return redirect()->route('my-user.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('my-user.index');
    }
}
