<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function inicio(){
        return view('Layouts.inicio');
    }
    public function ingreso(){
        return view('Layouts.ingreso');
    }
    public function graficos(){
        return view('Layouts.graficos');
    }
    public function reportes(){
        return view('Layouts.reportes');
    }
    public function consulta(){
        return view('Layouts.consulta');
    }
    public function registrarabonado(){
        return view('Layouts.registrarabonado');
    }
    public function listadeabonados(){
        return view('Layouts.listadeabonados');
    }
    public function pagodeabonados(){
        return view('Layouts.pagodeabonados');
    }
    public function operadores(){
        return view('Layouts.operadores');
    }
    public function caja(){
        return view('Layouts.caja');
    }
}
