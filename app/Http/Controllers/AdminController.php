<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('can:admins.index')  ->only('index');
        $this->middleware('can:admins.create') ->only('create', 'store');
        $this->middleware('can:admins.edit')   ->only('edit', 'update');
        $this->middleware('can:admins.destroy')->only('destroy');
    }

    public function index()
    {
        $admin = Admin::all();
        return view('Admin.index')->with('admins',$admin);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.create');
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
            'email' => 'required',
            'password' => 'required',
        ]);
        $usuario = new User();
        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');
        $usuario->password = bcrypt($request->input('password'));
        $usuario->plan = Auth::user()->plan;
        $usuario->assignRole('Administrador');
        $usuario->save();
        $admin = new Admin();
        $admin->user_id = $usuario->id;
        $admin->save();
        return redirect()->route('admin.index')->with('info', 'Administrador agregado');
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
        $admin = Admin::findorFail($id);
        $admin->load('user');
        return view('Admin.edit',['admin' => $admin]);
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
            'email' => 'required',
        ]);


        $user                   = User::findorFail($id);
        $user->name             = $request->input('name');
        $user->email            = $request->input('email');
        $user->save();

        $admin = $user->admin;
        $admin->user_id = $user->id;
        $admin->save();

        return redirect()->route('Admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::findorFail($id);
        $user   = User::findorFail($admin->user_id);
        $admin->delete();
        $user->delete();
        return redirect()->route('Admin.index');
    }
}
