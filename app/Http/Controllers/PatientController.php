<?php

namespace App\Http\Controllers;
use App\Models\Patient;
use App\Models\User;
use Carbon\Carbon;
use ESolution\DBEncryption\Encrypter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
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
        $id="";
        if(Auth::user()->hasRole('Administrador'))
        {
            $patients_id = DB::table('admins')
            ->select('admins.*')
            ->where('user_id',Auth::user()->id)
            ->get();
            foreach($patients_id as $patient_id)
            {
                $id=$patient_id->id;
            }
        } 
        else
        {
            $id= Auth::user()->admin_id;
        }
        $patients_use= Patient::paginate(5);
        $cont=0;
        $patients = DB::table('patients')
        ->select('patients.*')
        ->where('admin_id',$id)
        ->get();
        if(Auth::user()->plan=='basico'){
            foreach ($patients as $patient)
            {
                $cont=$cont+1;
            }
        }
        return view('Paciente.index',['patients'=>$patients_use,'contador'=>$cont,'id'=>$id]);
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
        $usuario->plan = Auth::user()->plan;
        $usuario->assignRole('Paciente');
        $usuario->save();
        $patient = new Patient();
        $patient->user_id = $usuario->id;
        $id="";
        if(Auth::user()->hasRole('Administrador'))
        {
            $patients_id = DB::table('admins')
            ->select('admins.*')
            ->where('user_id',Auth::user()->id)
            ->get();
            foreach($patients_id as $patient_id)
            {
                $id=$patient_id->id;
            }
        } 
        else
        {
            $id= Auth::user()->admin_id;
        }
        $patient->admin_id=$id;
        $patient->save();
        $usuario=$usuario->name;
        $mytime = Carbon::now('America/La_Paz');
        DB::statement('CALL insertar_bitacora(?,?,?,?,?,?)',['Paciente', 'Crear',Encrypter::encrypt($usuario),$mytime->toDateTimeString(),auth()->user()->id,
        Encrypter::encrypt(auth()->user()->name)]);
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
        $request->validate([
            'name' => 'required',
            'ci' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            
            'fecha_nacimiento' => 'required',
        ]);
        
        $patient = Patient::find($id);
        $usuario = User::find($patient->user_id);
        $usuario->name = $request->input('name');
        $usuario->ci = $request->input('ci');
        $usuario->address = $request->input('address');
        $usuario->phone = $request->input('phone');
        $usuario->email = $request->input('email');
        
        $usuario->fecha_nacimiento = $request->input('fecha_nacimiento');
        $usuario->save();

        $usuario = $usuario->name;
        $mytime = Carbon::now('America/La_Paz');
        DB::statement('CALL insertar_bitacora(?,?,?,?,?,?)',['Paciente', 'Modificar',Encrypter::encrypt($usuario),$mytime->toDateTimeString(),auth()->user()->id,
        Encrypter::encrypt(auth()->user()->name)]);

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

        $usuario=$usuario->name;
        $mytime = Carbon::now('America/La_Paz');
        DB::statement('CALL insertar_bitacora(?,?,?,?,?,?)',['Paciente', 'Eliminar',Encrypter::encrypt($usuario),$mytime->toDateTimeString(),auth()->user()->id,
        Encrypter::encrypt(auth()->user()->name)]);

        return redirect()->route('patient.index');
    }
}
