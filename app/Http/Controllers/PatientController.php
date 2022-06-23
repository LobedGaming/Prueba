<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('can:patients.index')  ->only('index');
        $this->middleware('can:patients.create') ->only('create', 'store');
        $this->middleware('can:patients.edit')   ->only('edit', 'update');
        $this->middleware('can:patients.destroy')->only('destroy');
    }
    public function index()
    {
        $patient = Patient::all();
        return view('Paciente.index',['patients'=>$patient]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Paciente.create');
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

        $patient = new Patient();
        $patient->user_id = $usuario->id;

        $patient->save();

        return redirect()->route('patient.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::find($id);
        return view('Paciente.show',['patient'=>$patient]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Patient::find($id);
        return view('Paciente.edit',['patient'=>$patient]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $patient = Patient::find($id);
        $request->validate([
            'name' => 'required',
            'ci' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            
            'fecha_nacimiento' => 'required',
        ]);

        $usuario = User::find($patient->user_id);
        $usuario->name = $request->input('name');
        $usuario->ci = $request->input('ci');
        $usuario->address = $request->input('address');
        $usuario->phone = $request->input('phone');
        $usuario->email = $request->input('email');
        
        $usuario->fecha_nacimiento = $request->input('fecha_nacimiento');
        
        $usuario->save();

        return redirect()->route('patient.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patient::find($id);
        $usuario = User::find($patient->user_id);
        $patient->delete();
        $usuario->delete();
        return redirect()->route('patient.index');
    }
}
