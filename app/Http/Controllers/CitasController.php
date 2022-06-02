<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Cita;
use App\Models\Secretarie;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
        // $hoy=new DateTime("now");
        // $citas=Cita::where('fecha_hora','>=',$hoy)->get();
        $citas=Cita::all();
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


    //todas las citas actuales y futuras para un doctor que recibe el id del doctor
    public function citasDoctor($id){
     $idsDoctor=Doctor::where('user_id',$id)->get();
     foreach($idsDoctor as $idDoctor)
     {
        $doctor_id=$idDoctor;
     }
     $hoy = Carbon::now('America/La_Paz')->subMinutes(15);
     $citas=Cita::where('doctor_id',$doctor_id->id)->where('fecha_hora','>=',$hoy)->get();
     return view('Doctor.agenda',['citas'=>$citas]);

    }
    // //todas las citas de un paciente que se recibe el id del paciente pasadas y futuras
    // public function citasPacienteAll($id){
    //     $citas=Cita::where('patient_id',$id)->get();
    //       return view('citas.index',['citas'=>$citas]);
    // }
    // //todas las citas de un paciente que se recibe el id del paciente
    // public function citasPaciente($id){
    //     $hoy=new DateTime("now");
    //     $citas=Cita::where('patient_id',$id)->where('fecha_hora','>=',$hoy)->get();
    //       return view('citas.index',['citas'=>$citas]);
    //   }
    

    
    //FUNCION INCOMPLETA, TERMINAR
    public function store(Request $request)
    {
        //15:45 esta creada citaDoctor
        // esta metiendo a las 15:50 request
        
    $citasDoctor = Cita::where('doctor_id',$request->doctor_id)->get();

    foreach ($citasDoctor as $citaDoctor){
        $hora = $citaDoctor->fecha_hora;
        $horaM = Carbon::parse($hora); //HoraM hora del foreach mas 15minutos
        $horaM->addMinutes(15);
        if($request->fecha_hora>=$citaDoctor->fecha_hora){
            if($request->fecha_hora<=$horaM){
                return 'ya hay una cita a esta hora';
            }
        }
        // if($request->fecha_hora>=$citaDoctor->fecha_hora and $request->fecha_hora<=$horaM){
        // //15:50   15:45                                         15:50                16:00
        //         return 'ya hay una cita a esta hora';
        // }
        else{
        } 
    }

        $cita = new Cita();
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
