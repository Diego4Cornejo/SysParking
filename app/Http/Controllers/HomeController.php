<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Estacionado;
use App\User;

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
        $estacionados = DB::table('estacionados')
        ->select(DB::raw('count(*) as estacionados'))
        ->where('ID_ESTADO', '=', 1)
        ->get();

        $abonados = DB::table('abonados')
        ->select(DB::raw('count(*) as abonados'))
        ->get();

        $operadores = DB::table('users')
        ->select(DB::raw('count(*) as operadores'))
        ->get();

        /** dd($estacionados -> estacionados); */
        // return view('Layouts.inicio');
        return view('/home' ,compact('estacionados','operadores','abonados'));
    }
}
