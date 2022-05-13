<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Cita;
use App\Models\Secretarie;
use DateTime;
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
        $doctors=Doctor::all();
        $pacientes=Patient::all();
        $hoy=new DateTime("now");
        $citas=Cita::where('fecha_hora','>=',$hoy)->get();
      //  $citas=Cita::all();
        return view('Citas.index',['citas'=>$citas,'doctors'=>$doctors,'patients'=>$pacientes]);
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


    //todas las citas de un doctor que se recibe el id del doctor
    public function citasDoctor($id){
        $hoy=new DateTime("now");
      $citas=Cita::where('doctor_id',$id)->where('fecha_hora','>=',$hoy)->get();
      
        return view('citas.index',['citas'=>$citas]);
    }
    //todas las citas pasadas y futuras de un doctor
    public function citasDoctorAll($id){
        $citas=Cita::where('doctor_id',$id)->get();
        return view('citas.index',['citas'=>$citas]);
    }

    //todas las citas de un paciente que se recibe el id del paciente pasadas y futuras
    public function citasPacienteAll($id){
        $citas=Cita::where('patient_id',$id)->get();
          return view('citas.index',['citas'=>$citas]);
    }
    //todas las citas de un paciente que se recibe el id del paciente
    public function citasPaciente($id){
        $hoy=new DateTime("now");
        $citas=Cita::where('patient_id',$id)->where('fecha_hora','>=',$hoy)->get();
          return view('citas.index',['citas'=>$citas]);
      }
    



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
        $citas = Cita::findorFail($id);
        return view('Citas.show',['citas' => $citas]);
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
        $cita = Cita::findorFail($id);
        $cita->delete();
        return redirect()->route('citas.index');

    }
}
