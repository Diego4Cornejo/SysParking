<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Tarifa;
use App\Estacionado;
use Session;
use Redirect;

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
        //$codebar = DNS1D::getBarcodeSVG("4445645656", "PHARMA2T");
        return view('ingreso.ingreso',compact('tarifas'));

    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
       /* $patente = $request->input('EST_PATENTE');
        $fktarifa = $request->get('idtarifa');
        $option = $request->get('OPCIONES');
        DB::table('estacionados')->insert(
            ['EST_PATENTE' => strtoupper($patente), 'ID_TARIFA' => $fktarifa, 'EST_CODIGOBOUCHER' => 1, 'ID_USUARIOINGRESO' => 1, 'ID_ESTADO' => 1, 'EST_INGRESO' => date("Y-m-d H:i:s")]
            
        );*/
        Estacionado::create([
            'EST_PATENTE' => strtoupper($request['EST_PATENTE']),
            'ID_TARIFA' => $request['idtarifa'],
            'EST_CODIGOBOUCHER' => strtoupper(Str::random(4)),
            'ID_USUARIOINGRESO' => 1,
            'ID_ESTADO' => 1,
            'EST_INGRESO' => date("Y-m-d H:i:s")
        ]);
        Session::flash('mensaje','Vehiculo Registrado Correctamente');
        
        return redirect('/ingreso');
    }
    public function show($id)
    {
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
