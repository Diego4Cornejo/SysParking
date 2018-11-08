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
        //dd($tarifas);
        return view('ingreso.ingreso',compact('tarifas'));
    }

    public function create(Request $request)
    {
        $patente = $request->input('EST_PATENTE');
        $fktarifa = $request->get('idtarifa');
        $option = $request->get('OPCIONES');
        DB::table('estacionados')->insert(
            ['EST_PATENTE' => strtoupper($patente), 'ID_TARIFA' => $fktarifa, 'EST_CODIGOBOUCHER' => 1, 'ID_USUARIOINGRESO' => 1, 'ID_ESTADO' => 1, 'EST_INGRESO' => date("Y-m-d H:i:s")]
            
        );
    }

    public function store(Request $request)
    {
        $name = $request->input('EST_PATENTE');
        DB::table('estacionados')->insert(
            ['EST_PATENTE' => $name, 'EST_TIPODEATENCION' => 'URGENCIA', 'EST_ESTADO' => 1, 'EST_INGRESO' => date("Y-m-d H:i:s")]
            
        );
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
