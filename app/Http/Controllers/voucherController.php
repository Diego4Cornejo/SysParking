<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class voucherController extends Controller
{
    //
    public function index()
    {
        $voucher = DB::table('estacionados')
        ->select(DB::raw('ID_ESTACIONADO,EST_CODIGOBOUCHER,EST_PATENTE,tarifas.TARIFAS_TIPODEATENCION,EST_INGRESO'))
        ->join('tarifas' , 'estacionados.ID_TARIFA', '=', 'tarifas.ID_TARIFA')
        ->orderBy('ID_ESTACIONADO' , 'desc')
        ->first();

        $fecha = substr( $voucher -> EST_INGRESO, 0,10);
        $hora = substr( $voucher -> EST_INGRESO, 11,5);

       /* (string) $fechacod = str_replace(
            array("-", ":", " "),
            '', $voucher -> EST_INGRESO);
        (string) $fechacod = substr( $fechacod ,4,4); */
        (string) $codvoucher = "{$voucher -> EST_CODIGOBOUCHER}{$voucher -> EST_PATENTE}";
        
        (string) $idpatente = strval( $voucher -> ID_ESTACIONADO );
        
        /*var_dump($idpatente);*/ 
        //dd($fecha,$hora);
        return view('voucher',compact('voucher','codvoucher','fecha','hora'));
    }
}
