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
        ->select(DB::raw('ID_CAJA,CAJA_FECHACIERRE'))
        ->orderBy('ID_CAJA', 'desc')
        ->first();

        $idcaja = $cajas->ID_CAJA; 
       /* var_dump($cajas ->CAJA_FECHACIERRE);
        dd($cajas ->CAJA_FECHACIERRE); */
        
        if ($cajas->CAJA_FECHACIERRE == NULL) {
            Session::forget('mensaje');
            return view('Caja.caja',compact('tarifas','cajas','idcaja'));

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
        $idcaja = $request['ID_CAJAS']; 

        if($request['consultapor'] == "Voucher"){
            $patente = substr( $request['PATENTE_CODVOU'] , 2, 6);
            $conteovehiculos = DB::table('estacionados')->where('EST_PATENTE',$patente)->where('ID_ESTADO',1)->count();
            if($conteovehiculos > 0){
            dd($conteovehiculos);
            $tarifas = tarifa::all();
            $datosvehiculo = DB::table('estacionados')
            ->select(DB::raw('ID_ESTACIONADO,EST_CODIGOBOUCHER,EST_PATENTE,tarifas.TARIFAS_TIPODEATENCION,tarifas.ID_TARIFA,tarifas.TARIFAS_CODIGO,EST_INGRESO,ID_ESTADO'))
            ->join('tarifas' , 'estacionados.ID_TARIFA', '=', 'tarifas.ID_TARIFA')
            ->where('EST_PATENTE',$patente)->where('ID_ESTADO',1)
            ->first();
            $voucher = "checked";
            $patente = "";
            }
            else{
                Session::flash('error','No hay registros con ese voucher');
                return redirect('/caja');
            }
        }
        elseif ($request['consultapor'] == "Patente") {
            $patente = substr( $request['PATENTE_CODVOU'] , 0, 6);
            $conteovehiculos = DB::table('estacionados')->where('EST_PATENTE',$patente)->where('ID_ESTADO',1)->count();
            if($conteovehiculos > 0){
            $tarifas = tarifa::all();
            $datosvehiculo = DB::table('estacionados')
            ->select(DB::raw('ID_ESTACIONADO,EST_CODIGOBOUCHER,EST_PATENTE,tarifas.TARIFAS_TIPODEATENCION,tarifas.ID_TARIFA,tarifas.TARIFAS_CODIGO,EST_INGRESO,ID_ESTADO'))
            ->join('tarifas' , 'estacionados.ID_TARIFA', '=', 'tarifas.ID_TARIFA')
            ->where('EST_PATENTE',$patente)->where('ID_ESTADO',1)
            ->first();
            $voucher = "";
            $patente = "checked";
            }
            else{
                Session::flash('error','No hay registros con esa patente');
                return redirect('/caja');
            }
        }
        $fecha = strtotime($datosvehiculo-> EST_INGRESO);
        $fechaingreso = substr( $datosvehiculo -> EST_INGRESO, 0,10);
        $horaingreso = substr( $datosvehiculo -> EST_INGRESO, 11,5);
        $fechasalidacompleto = strtotime(date("Y-m-d H:i:s"));
        $fechastring = date("Y-m-d H:i:s");
        $fechasalida = substr( $fechastring , 0,10);
        $horasalida = substr( $fechastring , 11,5);
        $tipodeingreso = $datosvehiculo -> TARIFAS_TIPODEATENCION;
        $duracion = (round(($fechasalidacompleto - $fecha) / 60.2)) - 5.0;
       // $duracion = round(abs($fechasalidacompleto - $fecha) / 60). " minutos";

        /*var_dump($fecha,$datosvehiculo -> EST_INGRESO,$duracion);
        dd($fecha,$datosvehiculo -> EST_INGRESO,$duracion);*/

        if($request['Documentos'] == "Si"){

            $codnuevatarifa = $datosvehiculo -> ID_TARIFA;
            if( $datosvehiculo -> TARIFAS_CODIGO == "AT001"){
                if($duracion < 35 && $duracion > 0){
                    $cobro = ($duracion * 20);
                }
                elseif($duracion > 35){

                    $cobro = 700;
                }
                else{
                    $cobro = "Aun no cumple el tiempo minimo ";
                    $duracion = 0;
                }

            }
            elseif( $datosvehiculo -> TARIFAS_CODIGO == "AT002" ){
                if($duracion <= 0){
                    $cobro = "Aun no cumple el tiempo minimo";
                    $duracion = 0;
                }
                else{
                $cobro = ($duracion * 20);
                }

            }
            elseif( $datosvehiculo -> TARIFAS_CODIGO == "AT003" ){
                $cobro = 0;
            }
            elseif( $datosvehiculo -> TARIFAS_CODIGO == "AT004" ){
                if($duracion <= 0){
                    $cobro = "Aun no cumple el tiempo minimo";
                    $duracion = 0;
                }
                else{
                $cobro = ($duracion * 20);
                }
            }

        }
        else{

            $codnuevatarifa = $request['idtarifa'];
            $nuevatarifa = DB::table('tarifas')
            ->select(DB::raw('TARIFAS_CODIGO,TARIFAS_TIPODEATENCION'))
            ->where('ID_TARIFA',$codnuevatarifa)
            ->first();
            $tipodeingreso = $nuevatarifa -> TARIFAS_TIPODEATENCION;

            if( $nuevatarifa -> TARIFAS_CODIGO == "AT001"){
                if($duracion < 35 && $duracion > 0){
                    $cobro = ($duracion * 20);
                }
                elseif($duracion > 35){

                    $cobro = 700;
                }
                else{
                    $cobro = "Aun no cumple el tiempo minimo ";
                    $duracion = 0;
                }

            }
            elseif( $nuevatarifa -> TARIFAS_CODIGO == "AT002" ){
                if($duracion <= 0){
                    $cobro = "Aun no cumple el tiempo minimo";
                    $duracion = 0;
                }
                else{
                $cobro = ($duracion * 20);
                }

            }
            elseif( $nuevatarifa -> TARIFAS_CODIGO == "AT003" ){
                $cobro = 0;
            }
            elseif( $nuevatarifa -> TARIFAS_CODIGO == "AT004" ){
                if($duracion <= 0){
                    $cobro = "Aun no cumple el tiempo minimo";
                    $duracion = 0;
                }
                else{
                $cobro = ($duracion * 20);
                }
            }
        }

        

        Session::flash('mensaje','Vehiculo Encontrado');


        return view('Caja.caja',compact('datosvehiculo','fechaingreso','tipodeingreso','horaingreso','fechastring','fechasalida','duracion','horasalida','tarifas','patentecod','voucher','patente','cobro','idcaja','codnuevatarifa'));
    }
    public function store(Request $request)
    {
        //
        caja::create([
            'ID_USUARIO' => Auth::user()->id,
            'CAJA_FECHAAPERTURA' => date("Y-m-d H:i:s"),
            'CAJA_MONTOINICIAL' => $request['MONTO_APERTURA'],
            'CAJA_ESTADO' => "Abierta"
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
        $caja = Caja::find($id);
        $fecha = substr( $caja -> CAJA_FECHAAPERTURA, 0,10);
        $hora = substr( $caja -> CAJA_FECHAAPERTURA, 11,5);
        $montoinicial = $caja -> CAJA_MONTOINICIAL;

        $montocalculado = (DB::table('estacionados')->where('ID_CAJA',$id)->sum('COBRO'))+$montoinicial;
        return view('caja.cierredecaja',compact('caja','id','fecha','hora','montoinicial','montocalculado'));
        
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
        $caja= Caja::find($id);
        $caja->CAJA_FECHACIERRE=$request->get('FECHA_CIERRE');
        $caja->CAJA_MONTOFINAL=$request->get('MONTO_CIERRE');
        $caja->CAJA_ESTADO="Cerrada";

        $caja->save();
        Session::flash('cerrada','Cierre de Caja Realizado Correctamente');
        return redirect('/caja');
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
