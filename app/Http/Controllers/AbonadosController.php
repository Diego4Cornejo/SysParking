<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use App\Abonado;
use Session;
use Redirect;

class AbonadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planes = Plan::all();
        return view('Abonados.registrarabonado',compact('planes'));
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
    public function store(Request $request)
    {
        //
        Abonado::create([
            'AB_CODIGO' => 'AB002',
            'PLAN_ID' => $request['idplan'],
            'AB_PATENTE' => strtoupper($request['AB_PATENTE']),
            'AB_RUN' => $request['AB_RUT'],
            'AB_NOMBRE' => $request['AB_NOMBRE'],
            'AB_SEXO' => $request['AB_SEXO'],
            'AB_CORREO' => $request['AB_CORREO'],
            'AB_NUMERODETELEFONO' => $request['AB_NUMERO'],
            'AB_FECHADENACIMIENTO' => date("Y-m-d H:i:s"),
            'AB_ESTADO' => 'Registrado'
        ]);
        Session::flash('mensaje','Abonado Registrado Correctamente');
        return redirect('/abonados');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
