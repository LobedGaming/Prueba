<?php

namespace App\Http\Controllers;

use App\Models\Secretarie;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SecretarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('can:secretaries.index')  ->only('index');
        $this->middleware('can:secretaries.create') ->only('create', 'store');
        $this->middleware('can:secretaries.edit')   ->only('edit', 'update');
        $this->middleware('can:secretaries.show')   ->only('show');
        $this->middleware('can:secretaries.destroy')->only('destroy');
    }

    public function index()
    {
        $Secretarios = Secretarie::paginate(5);
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

        $mytime = Carbon::now('America/La_Paz');
        DB::statement('CALL insertar_bitacora(?,?,?,?,?,?)',['Secretario', 'Crear',$usuario->name,$mytime->toDateTimeString(),auth()->user()->id,
        auth()->user()->name]);
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

        $mytime = Carbon::now('America/La_Paz');
        DB::statement('CALL insertar_bitacora(?,?,?,?,?,?)',['Secretario', 'Modificar',$usuario->name,$mytime->toDateTimeString(),auth()->user()->id,
        auth()->user()->name]);

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
        $usuario = User::find($secretario->user_id);
        $secretario->delete();
        $usuario->delete();

        $mytime = Carbon::now('America/La_Paz');
        DB::statement('CALL insertar_bitacora(?,?,?,?,?,?)',['Secretario', 'Eliminar',$usuario->name,$mytime->toDateTimeString(),auth()->user()->id,
        auth()->user()->name]);

        return redirect()->route('secretario.index');
    }
}
