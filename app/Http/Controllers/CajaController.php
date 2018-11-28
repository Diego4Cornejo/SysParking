<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\caja;
use Illuminate\Support\Facades\Auth;
use Session;
use Redirect;

class CajaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cajas = DB::table('cajas')
        ->select(DB::raw('CAJA_FECHACIERRE'))
        ->orderBy('ID_CAJA', 'desc')
        ->first();
       
       /* var_dump($cajas ->CAJA_FECHACIERRE);
        dd($cajas ->CAJA_FECHACIERRE); */
        
        if ($cajas->CAJA_FECHACIERRE == NULL) {
            return view('Caja.caja');
        } else {
            return view('Caja.aperturadecaja');
        }
        
    }
    public function GetData()
    {
        $datosvehi = DB::table('estacionados')
        ->select(DB::raw('ID_ESTACIONADO,EST_CODIGOBOUCHER,EST_PATENTE,tarifas.TARIFAS_TIPODEATENCION,EST_INGRESO,ID_ESTADO'))
        ->join('tarifas' , 'estacionados.ID_TARIFA', '=', 'tarifas.ID_TARIFA')
        ->where('EST_PATENTE',request()->id)->where('ID_ESTADO',1)
        ->get();

        return Response::json($datosvehi);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        caja::create([
            'ID_USUARIO' => Auth::user()->id,
            'CAJA_FECHAAPERTURA' => date("Y-m-d H:i:s"),
            'CAJA_MONTOINICIAL' => $request['MONTO_APERTURA']
        ]);
        Session::flash('mensaje','Vehiculo Registrado Correctamente');
        
        return redirect('/caja');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
