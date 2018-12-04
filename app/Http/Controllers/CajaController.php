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
        $patentecod = $request['PATENTE_CODVOU'];    

        if($request['consultapor'] == "Voucher"){
            $patente = substr( $request['PATENTE_CODVOU'] , 2, 6);
            $tarifas = tarifa::all();
            $datosvehiculo = DB::table('estacionados')
            ->select(DB::raw('ID_ESTACIONADO,EST_CODIGOBOUCHER,EST_PATENTE,tarifas.TARIFAS_TIPODEATENCION,tarifas.TARIFAS_CODIGO,EST_INGRESO,ID_ESTADO'))
            ->join('tarifas' , 'estacionados.ID_TARIFA', '=', 'tarifas.ID_TARIFA')
            ->where('EST_PATENTE',$patente)->where('ID_ESTADO',1)->where('ID_ESTADO',1)
            ->first();
            $voucher = "checked";
            $patente = "";
        }
        elseif ($request['consultapor'] == "Patente") {
            $patente = substr( $request['PATENTE_CODVOU'] , 0, 6);
            $tarifas = tarifa::all();
            $datosvehiculo = DB::table('estacionados')
            ->select(DB::raw('ID_ESTACIONADO,EST_CODIGOBOUCHER,EST_PATENTE,tarifas.TARIFAS_TIPODEATENCION,tarifas.TARIFAS_CODIGO,EST_INGRESO,ID_ESTADO'))
            ->join('tarifas' , 'estacionados.ID_TARIFA', '=', 'tarifas.ID_TARIFA')
            ->where('EST_PATENTE',$patente)->where('ID_ESTADO',1)->where('ID_ESTADO',1)
            ->first();
            $voucher = "";
            $patente = "checked";
        }
        $fecha = strtotime($datosvehiculo-> EST_INGRESO);
        $fechaingreso = substr( $datosvehiculo -> EST_INGRESO, 0,10);
        $horaingreso = substr( $datosvehiculo -> EST_INGRESO, 11,5);
        $fechasalidacompleto = strtotime(date("Y-m-d H:i:s"));
        $fechastring = date("Y-m-d H:i:s");
        $fechasalida = substr( $fechastring , 0,10);
        $horasalida = substr( $fechastring , 11,5);

        $duracion = (round(($fechasalidacompleto - $fecha) / 60.2)) - 5.0;
       // $duracion = round(abs($fechasalidacompleto - $fecha) / 60). " minutos";

        /*var_dump($fecha,$datosvehiculo -> EST_INGRESO,$duracion);
        dd($fecha,$datosvehiculo -> EST_INGRESO,$duracion);*/

        if($request['Documentos'] == "Si"){
            if( $datosvehiculo -> TARIFAS_CODIGO == "AT001"){


            }
            elseif( $datosvehiculo -> TARIFAS_CODIGO == "AT002" ){

            }
            elseif( $datosvehiculo -> TARIFAS_CODIGO == "AT003" ){

            }
            elseif( $datosvehiculo -> TARIFAS_CODIGO == "AT004" ){

            }

        }


        Session::flash('mensaje','Vehiculo Encontrado');


        return view('Caja.caja',compact('datosvehiculo','fechaingreso','horaingreso','fechasalida','duracion','horasalida','tarifas','patentecod','voucher','patente'));
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
