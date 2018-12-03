<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\caja;
use App\Tarifa;
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
        $tarifas = tarifa::all();

        $conteo = DB::table('cajas')->count();
        if($conteo == 0)
        {
            return view('Caja.aperturadecaja');
        }
        else{

        $cajas = DB::table('cajas')
        ->select(DB::raw('CAJA_FECHACIERRE'))
        ->orderBy('ID_CAJA', 'desc')
        ->first();
       
       /* var_dump($cajas ->CAJA_FECHACIERRE);
        dd($cajas ->CAJA_FECHACIERRE); */
        
        if ($cajas->CAJA_FECHACIERRE == NULL) {
            Session::forget('mensaje');
            return view('Caja.caja',compact('tarifas'));

        } else {
            return view('Caja.aperturadecaja');
        }
     }
        
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
    public function consultar(Request $request)
    {
        $tarifas = tarifa::all();
        $datosvehiculo = DB::table('estacionados')
        ->select(DB::raw('ID_ESTACIONADO,EST_CODIGOBOUCHER,EST_PATENTE,tarifas.TARIFAS_TIPODEATENCION,EST_INGRESO,ID_ESTADO'))
        ->join('tarifas' , 'estacionados.ID_TARIFA', '=', 'tarifas.ID_TARIFA')
        ->where('EST_PATENTE',$request['PATENTE_CODVOU'])->where('ID_ESTADO',1)
        ->first();
        
        $fecha = substr( $datosvehiculo -> EST_INGRESO, 0,10);
        $hora = substr( $datosvehiculo -> EST_INGRESO, 11,5);

        Session::flash('mensaje','Vehiculo Encontrado');


        return view('Caja.caja',compact('datosvehiculo','fecha','hora','tarifas'));
    }
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
