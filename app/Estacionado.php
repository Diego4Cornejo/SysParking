<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estacionado extends Model
{
    //

    protected $table = "estacionados";
    protected $fillable =[
        'EST_TIPODEATENCION',
        'EST_PATENTE',
        'EST_CODIGOBOUCHER',
        'EST_INGRESO',
        'EST_SALIDA',
        'COBRO',
        'ID_TARIFA',
        'ID_TARIFASALIDA',
        'EST_DURACION',
        'EST_CODIGOBOUCHER',
        'ID_USUARIOINGRESO',
        'ID_ESTADO'
    ];
    protected $guarded = ["ID_ESTACIONADO"];
    protected $primaryKey = "ID_ESTACIONADO";
    protected $dates = ['EST_INGRESO' => 'Y-m-d','EST_SALIDA' => 'Y-m-d'];
    
}
