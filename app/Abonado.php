<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abonado extends Model
{
    //
    protected $table = "abonados";
    protected $fillable =[
        'AB_CODIGO',
        'PLAN_ID',
        'AB_PATENTE',
        'AB_RUN',
        'AB_NOMBRE',
        'AB_FECHADENACIMIENTO',
        'AB_SEXO',
        'AB_CORREO',
        'AB_NUMERODETELEFONO',
        'AB_ESTADO'
    ];
    protected $guarded = ["ABONADO_ID"];
    protected $primaryKey = "ABONADO_ID";
    protected $dates = ['AB_FECHADENACIMIENTO' => 'Y-m-d'];
}
