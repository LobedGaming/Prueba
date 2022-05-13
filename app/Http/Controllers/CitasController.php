<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Cita;
use App\Models\Secretarie;
use Illuminate\Http\Request;


class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $citas=Cita::all();
        $citas->load('doctor');
        return [$citas];
        // me cago
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors=Doctor::all();
        $pacientes=Patient::all();
        $citas=Cita::all();
        return view('citas.create',['citas'=>$citas,'doctors'=>$doctors,'patients'=>$pacientes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $cita       = new Cita();
    $cita->fecha_hora    = $request->input('fecha_hora');
    $cita->description   = $request->input('description');
    $cita->doctor_id     = $request->input('doctor_id');
    $cita->secretarie_id = $request->input('secretarie_id');
    $cita->patient_id    = $request->input('patient_id');
    $cita->save();
    return redirect()->route('citas.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
