<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    { 
        
        $usuario = new User();
        $usuario->name = $data['name'];
        $usuario->ci = $data['ci'];
        $usuario->address = $data['address'];
        $usuario->phone = $data['phone'];
        $usuario->email = $data['email'];
        $usuario->password = bcrypt($data['password']);
        $usuario->fecha_nacimiento =$data['fecha_nacimiento'];
        if($data['plan']==1){
            $usuario->plan='basico';  
        }
        if($data['plan']==2){
            $usuario->plan='estandar';  
        }
        if($data['plan']==3){
            $usuario->plan='profesional';  
        }
        $usuario->assignRole('Administrador');
        $usuario->save();
        $administrador = new Admin();
        $administrador->admin_id= $administrador->id;
        $administrador->user_id= $usuario->id;
        $administrador->save();
        return $usuario;
    }
}
