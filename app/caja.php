<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class caja extends Model
{
    //
    protected $table = "cajas";
    protected $fillable =[
        'ID_USUARIO',
        'CAJA_FECHAAPERTURA',
        'CAJA_FECHACIERRE',
        'CAJA_MONTOINICIAL',
        'CAJA_MONTOFINAL',
    ];
    protected $guarded = ["ID_CAJA"];
    protected $primaryKey = "ID_CAJA";
    protected $dates = ['CAJA_FECHAAPERTURA' => 'Y-m-d','CAJA_FECHACIERRE' => 'Y-m-d'];
}
