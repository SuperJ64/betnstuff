<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $playing = Auth::user()->playing()->get();

        return view('home', ['games'=>$playing]);
    }

    public function admin() {
        $admin = Auth::user()->running()->get();

        return view('admin', ['games'=>$admin]);
    }

    public function create() {
        return redirect('/');
    }
}
