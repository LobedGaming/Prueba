<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Historico;
use App\Models\Patient;
use App\Models\Receta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HistoricoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('can:historico.index')  ->only('index');
        $this->middleware('can:historico.show')   ->only('show');
    }

    public function index()
    {
        //
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
        return view('Historico.index',['patients'=> $patients_use,'id'=>$id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Historico  $historico
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $citas= Cita::where('patient_id',$id)->get();
        $recetas=Receta::all();
        return view('Historico.show',['citas'=>$citas,'recetas'=>$recetas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Historico  $historico
     * @return \Illuminate\Http\Response
     */
    public function edit(Historico $historico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Historico  $historico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Historico $historico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Historico  $historico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Historico $historico)
    {
        //
    }
}
