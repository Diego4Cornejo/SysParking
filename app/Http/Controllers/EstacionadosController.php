<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
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
            'EST_CODIGOBOUCHER' => strtoupper(Str::random(2)),
            'ID_USUARIOINGRESO' => Auth::user()->id,
            'ID_ESTADO' => 1,
            'EST_INGRESO' => date("Y-m-d H:i:s")
        ]);
        Session::flash('ingresado','Vehiculo Registrado Correctamente');
        
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
        if($request['COBRO'] == "Aun no cumple el tiempo minimo"){

            $estacionados= Estacionado::find($id);
            $estacionados->ID_ESTADO=2;
            $estacionados->ID_CAJA=$request->get('ID_CAJA');
            $estacionados->EST_SALIDA=$request->get('FECHA_SALIDA');
            $estacionados->COBRO=0;
            $estacionados->ID_TARIFASALIDA=$request->get('TARIFANUEVA');
            $estacionados->EST_DURACION=$request->get('DURACION');

        }else{
        $estacionados= Estacionado::find($id);
        $estacionados->ID_ESTADO=2;
        $estacionados->ID_CAJA=$request->get('ID_CAJA');
        $estacionados->EST_SALIDA=$request->get('FECHA_SALIDA');
        $estacionados->COBRO=$request->get('COBRO');
        $estacionados->ID_TARIFASALIDA=$request->get('TARIFANUEVA');
        $estacionados->EST_DURACION=$request->get('DURACION');
        }
        

        $estacionados->save();
        Session::flash('cobrado','Cobro Realizado Correctamente');
        return redirect('/caja');
    }
    public function destroy($id)
    {
        //
    }
}
