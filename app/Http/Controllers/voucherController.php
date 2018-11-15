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
        ->select(DB::raw('ID_ESTACIONADO,EST_PATENTE'))
        ->orderBy('ID_ESTACIONADO' , 'desc')
        ->first();
        return view('voucher',compact('voucher'));
    }
}
