<?php

namespace App\Http\Controllers;

use App\Models\Secretarie;
use App\Models\User;
use Illuminate\Http\Request;

class SecretarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Secretarios = Secretarie::all();
        return view("Secretario.index")->with('Secretarios',$Secretarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Secretario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'ci' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required',
            'fecha_nacimiento' => 'required',
        ]);

        $usuario = new User();
        $usuario->name = $request->input('name');
        $usuario->ci = $request->input('ci');
        $usuario->address = $request->input('address');
        $usuario->phone = $request->input('phone');
        $usuario->email = $request->input('email');
        $usuario->password = bcrypt($request->input('password'));
        $usuario->fecha_nacimiento = $request->input('fecha_nacimiento');
        $usuario->save();
        $secretario = new Secretarie();
        $secretario->user_id = $usuario->id;
        $secretario->save();
        return redirect()->route('secretario.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Secretario  $secretario
     * @return \Illuminate\Http\Response
     */
    public function show(Secretarie $secretario)
    {
        return view('Secretario.show',['secretario'=>$secretario]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Secretario  $secretario
     * @return \Illuminate\Http\Response
     */
    public function edit(Secretarie $secretario)
    {
        return view('Secretario.edit',['secretario'=>$secretario]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Secretario  $secretario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Secretarie $secretario)
    {
        $request->validate([
            'name' => 'required',
            'ci' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required', 
            'fecha_nacimiento' => 'required',
        ]);
        $usuario = User::find($secretario->user_id);
        $usuario->name = $request->input('name');
        $usuario->ci = $request->input('ci');
        $usuario->address = $request->input('address');
        $usuario->phone = $request->input('phone');
        $usuario->email = $request->input('email');
        $usuario->fecha_nacimiento = $request->input('fecha_nacimiento');
        $usuario->update();
        return redirect()->route('secretario.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Secretario  $secretario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Secretarie $secretario)
    {
        $secretario = Secretarie::findorFail($secretario->id);
        $user= User::findorFail($secretario->user_id);
        $secretario->delete();
        $user->delete();
        
        return redirect()->route('secretario.index');
    }
}
