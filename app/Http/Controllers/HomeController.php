<?php

namespace App\Http\Controllers;
 use App\Http\Controllers\Auth;
use DateTime;
use Hamcrest\Core\HasToString;
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
        return view('home');
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->to('/');
    }
}
