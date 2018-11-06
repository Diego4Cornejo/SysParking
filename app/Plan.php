<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table = "plans";
    protected $fillable =[
        'PLAN_NOMBRE',
        'PLAN_PRECIO',
        'PLAN_CARACTERISTICAS',
        'PLAN_FECHADEPAGO'
    ]
    protected $guarded = ["ID_PLAN"];
    protected $primaryKey = "ID_PLAN";
    protected $dates = ['PLAN_FECHADEPAGO' => 'Y-m-d'];
}
