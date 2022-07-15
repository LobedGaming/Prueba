<?php

namespace App\Http\Controllers;

use App\Models\Secretarie;
use App\Models\User;
use Carbon\Carbon;
use ESolution\DBEncryption\Encrypter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

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
        $id="";
        if(Auth::user()->hasRole('Administrador'))
        {
            $Secretaries_id = DB::table('admins')
            ->select('admins.*')
            ->where('user_id',Auth::user()->id)
            ->get();
            foreach($Secretaries_id as $Secretarie_id)
            {
                $id=$Secretarie_id->id;
            }
        } 
        else
        {
            $id= Auth::user()->admin_id;
        }
        $Secretarios= Secretarie::paginate(5);
        $cont=0;
        $Secretaries = DB::table('secretaries')
        ->select('secretaries.*')
        ->where('admin_id',$id)
        ->get();
        if(Auth::user()->plan=='basico'){
            foreach ($Secretaries as $Secretarie)
            {
                $cont=$cont+1;
            }
        }
        // $Secretarios = Secretarie::paginate(5);
        // $cont=0;
        // $doctores = DB::table('secretaries')
        // ->select('secretaries.*')
        // ->where('admin_id', Auth::user()->admins->admin_id)
        // ->get();
        // foreach ($doctores as $doctorin)
        // {
        //     $cont=$cont+1;
        // }
        return view("Secretario.index")->with('Secretarios',$Secretarios)->with('contador',$cont)->with('id',$id);
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
        $usuario->plan = Auth::user()->plan;
        $usuario->assignRole('Secretario');
        $usuario->save();

        if(Auth::user()->hasRole('Administrador'))
        {
            $Secretaries_id = DB::table('admins')
            ->select('admins.*')
            ->where('user_id',Auth::user()->id)
            ->get();
            foreach($Secretaries_id as $Secretarie_id)
            {
                $id=$Secretarie_id->id;
            }
        } 
        else
        {
            $id= Auth::user()->admin_id;
        }
        $secretario = new Secretarie();
        $secretario->user_id = $usuario->id;
        $secretario->admin_id=$id;
        $secretario->save();

        $usuario = $usuario->name;
        $mytime = Carbon::now('America/La_Paz');
        DB::statement('CALL insertar_bitacora(?,?,?,?,?,?)',['Secretario', 'Crear',Encrypter::encrypt($usuario),$mytime->toDateTimeString(),auth()->user()->id,
        Encrypter::encrypt(auth()->user()->name)]);
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

        $usuario = $usuario->name;
        $mytime = Carbon::now('America/La_Paz');
        DB::statement('CALL insertar_bitacora(?,?,?,?,?,?)',['Secretario', 'Modificar',Encrypter::encrypt($usuario),$mytime->toDateTimeString(),auth()->user()->id,
        Encrypter::encrypt(auth()->user()->name)]);

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

        $usuario = $usuario->name;
        $mytime = Carbon::now('America/La_Paz');
        DB::statement('CALL insertar_bitacora(?,?,?,?,?,?)',['Secretario', 'Eliminar',Encrypter::encrypt($usuario),$mytime->toDateTimeString(),auth()->user()->id,
        Encrypter::encrypt(auth()->user()->name)]);

        return redirect()->route('secretario.index');
    }
}
