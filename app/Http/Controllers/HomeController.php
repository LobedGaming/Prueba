<?php

namespace App\Http\Controllers;
<<<<<<< HEAD
 use App\Http\Controllers\Auth;
use DateTime;
use Hamcrest\Core\HasToString;
=======
use App\Http\Controllers\Auth;
>>>>>>> 1de25b282f4b64e43e2c77c75167078be525ad7a
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->middleware('auth');
        return view('home');
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->to('/');
    }
}
