<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Tarifa;
use App\Estacionado;

class EstacionadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarifas = tarifa::all();
        return view('Layouts.ingreso',compact('tarifas'));
    }

    public function create()
    {
        DB::table('estacionados')->insert(
            ['EST_PATENTE' => '328323', 'EST_TIPODEATENCION' => 'URGENCIA', 'EST_ESTADO' => 1, 'EST_INGRESO' => date("Y-m-d H:i:s")]
            
        );

    }

    public function store(Request $request)
    {

    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        return view('estacionados.agregar');
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}
