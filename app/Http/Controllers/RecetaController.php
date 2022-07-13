<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Receta;
use App\Models\User;
use Carbon\Carbon;
use ESolution\DBEncryption\Encrypter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('can:receta.index')  ->only('index');
        $this->middleware('can:receta.create') ->only('create', 'store');
        $this->middleware('can:receta.show')   ->only('show');
        $this->middleware('can:receta.destroy')->only('destroy');
        
    }

    public function index()
    {
        $recetas=Receta::all();
        $doctors=Doctor::all();
        $pacientes=Patient::all();
        $citas=Cita::all();
        return view('receta.index',['receta'=>$recetas,'citas'=>$citas,'doctors'=>$doctors,'patients'=>$pacientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Cita $cita)
    {
        // $doctors=Doctor::all();
        // $pacientes=Patient::all();
        // $citas=Cita::all();
        return $cita;
        // return view('receta.create',['citas'=>$citas,'doctors'=>$doctors,'patients'=>$pacientes]);
    }
    public function createCita($cita)
    {
        // $doctors=Doctor::all();
        // $pacientes=Patient::all();
        // $citas=Cita::all();
        // return $cita;
        return view('receta.create', compact('cita'));
        // return view('receta.create',['citas'=>$citas,'doctors'=>$doctors,'patients'=>$pacientes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $receta = new Receta();
        $dateAct = Carbon::now('America/La_Paz');

        $receta->fecha_hora    = $dateAct;
        $receta->description   = $request->input('description');
        $receta->cita_id = $request->input('cita_id');
        $receta->save();
        
        $cita = Cita::find($receta->cita_id);
        $paciente = Patient::find($cita->patient_id);
        $usuario = User::find($paciente->user_id);
        $usuario = $usuario->name;
        $mytime = Carbon::now('America/La_Paz');
        DB::statement('CALL insertar_bitacora(?,?,?,?,?,?)',['Receta', 'Crear',Encrypter::encrypt($usuario),$mytime->toDateTimeString(),auth()->user()->id,
        Encrypter::encrypt(auth()->user()->name)]);
        
        return redirect()->route('receta.show', $request->input('cita_id'))->with('info', 'Receta agregada');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recetas = Receta::where('cita_id', $id)->get();
        $doctor = $this->getDoctor(Cita::where('id', $id)->get()[0]->doctor_id);
        $patient = User::find(Patient::find(Cita::where('id', $id)->get()[0]->patient_id)->user_id);
        return view('receta.show', compact('recetas', 'doctor', 'patient'));
    }

    public function getDoctor($id){
        $doctor_Doctor = Doctor::find($id);
        $doctor_User = User::find($doctor_Doctor->user_id);
        $dateArray = [$doctor_User, $doctor_Doctor];
        return $dateArray;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->idCita = $id;
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
