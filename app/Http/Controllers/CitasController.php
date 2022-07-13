<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Cita;
use App\Models\Receta;
use App\Models\Secretarie;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use ESolution\DBEncryption\Encrypter;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('can:citas.index')  ->only('index');
        $this->middleware('can:citas.create') ->only('create', 'store');
        $this->middleware('can:citas.edit')   ->only('edit', 'update');
        $this->middleware('can:citas.show')   ->only('show');
        $this->middleware('can:citas.destroy')->only('destroy');
        $this->middleware('can:citas.citasDoctor')->only('citasDoctor');
        $this->middleware('can:citas.citasPaciente')->only('citasPaciente');
    }

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

     
     return view('Doctor.agenda',['citas'=>$citas, 'dataJson'=>json_encode($this->loadDataJsonCitasDoctor($citas))]);
    
    }
   
    public function loadDataJsonCitasDoctor($citas){
    $array = [];
     foreach($citas as $cita){
        $patient = Patient::find($cita->patient_id);
        $usuario = User::find($patient->user_id);
        $originalDate =  $cita->fecha_hora;
        $date = Carbon::parse($originalDate, 'UTC');
        array_push( $array, [
                         "id"=>$cita->id,  
                         "name"=>$usuario->name,
                         "occasion" => $cita->description,
                         "invited_count"=> 0,
                         "year"=>  (int)$date->isoFormat('Y'),
                         "month"=> (int)$date->isoFormat('M'),
                         "day"=>   (int)$date->isoFormat('D'),
                         "cancelled"=> true
                        ]
                    );
     };
     return [
         "events" => $array
     ];
    }
    // //todas las citas de un paciente que se recibe el id del paciente pasadas y futuras
    // public function citasPacienteAll($id){
    //     $citas=Cita::where('patient_id',$id)->get();
    //       return view('citas.index',['citas'=>$citas]);
    // }
    //todas las citas de un paciente que se recibe el id del paciente
    public function citasPaciente($id){
        $paciente_ids=Patient::where('user_id',$id)->get();
        foreach($paciente_ids as $paciente_id)
        {
            $patient_id=$paciente_id;
        }
        $citas= Cita::where('patient_id',$patient_id->id)->get();
        $recetas=Receta::all();
        return view('Historico.show',['citas'=>$citas,'recetas'=>$recetas]);
      }
    

    
    //FUNCION INCOMPLETA, TERMINAR
    public function store(Request $request){
    //dd( $horaAct=Carbon::now('America/La_Paz'));
    //dd(Carbon::parse($request->fecha_hora));
    $horaAct=Carbon::now('America/La_Paz');
    if(Carbon::parse($request->fecha_hora)->gte($horaAct) )
    {
    $citasDoctor = Cita::where('doctor_id',$request->doctor_id)->get();
    foreach ($citasDoctor as $citaDoctor){
        $hora = $citaDoctor->fecha_hora;
        $horaM = Carbon::parse($hora); //HoraM hora del foreach mas 15minutos
        $horaM->addMinutes(15);
        if(Carbon::parse($request->fecha_hora)->gte($citaDoctor->fecha_hora)){
            if(Carbon::parse($request->fecha_hora)->lte($horaM)){
                return redirect()->route('citas.create')
                ->with('info','El Doctor ya tiene una cita a esta hora');
            }
        }
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
        
        $paciente = Patient::find($cita->patient_id);
        $usuario = User::find($paciente->user_id);
        $usuario = $usuario -> name;
        $mytime = Carbon::now('America/La_Paz');
        DB::statement('CALL insertar_bitacora(?,?,?,?,?,?)',['Cita', 'Crear',$usuario = Encrypter::encrypt($usuario),$mytime->toDateTimeString(),auth()->user()->id,Encrypter::encrypt(auth()->user()->name)]);
        
        return redirect()->route('citas.index');
      }
      return redirect()->route('citas.create')
      ->with('info','Hora Incorrecta, seleccione de nuevo');
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

        $paciente = Patient::find($cita->patient_id);
        $usuario = User::find($paciente->user_id);
        $usuario = $usuario -> name;
        $mytime = Carbon::now('America/La_Paz');
        DB::statement('CALL insertar_bitacora(?,?,?,?,?,?)',['Cita', 'Eliminar',Encrypter::encrypt($usuario),$mytime->toDateTimeString(),auth()->user()->id,
        Encrypter::encrypt(auth()->user()->name)]);
        return redirect()->route('citas.index');

    }
}
