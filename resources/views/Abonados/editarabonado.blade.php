@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Registro de Abonados</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Formulario de registro de Abonados
            </div>
            <div class="panel-body">
                    <div class="col-md-6"> 
                    <!--<form role="form" action={//{url('abonado/registrar')}}> -->
                        {!!Form::open(['route' => 'abonados.update','method' => 'POST'])!!}
                            <br>
                            <div class="form-group">
                                <label>Nombre Completo :</label>
                                <input class="form-control" name="AB_NOMBRE" placeholder="">
                            </div>
                            <div class="form-group">
                                    <label>Rut :</label>
                                    <input class="form-control" name="AB_RUT" placeholder="">
                            </div>
                            <div class="form-group">
                                    <label>Sexo :</label>
                                    <select name="AB_SEXO" id="AB_SEXO" type="text" class="form-control">
                                        <option value="0">Seleccionar..</option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                    <label>Correo Electronico :</label>
                                    <input name="AB_CORREO" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                    <label>Numero Telefonico :</label>
                                    <input name="AB_NUMERO" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <br>
                            <div class="form-group">
                                    <label>Patente del Vehiculo :</label>
                                    <input class="form-control" name="AB_PATENTE" maxlength="6" autocomplete="off"  placeholder="">
                            </div>
                            <div class="form-group">
                                    <label>Tipo de Plan :</label>
                                    <select name="idplan" id="idplan" type="text" class="form-control">
                                        <option>Seleccionar...</option>
                                        @forelse ($planes as $plan)
                                            <option value="{{$plan -> ID_PLAN}}"name="EST_TIPODEATENCION">{{ $plan -> PLAN_NOMBRE }}  ${{ $plan -> PLAN_PRECIO }} </option>
                                        @empty
        
                                        @endforelse
                                    </select>
                                    
                            </div>
                            <fieldset disabled>
                                    <div class="form-group">
                                        <label for="disabledSelect">Precio:</label>
                                        <input class="form-control" id="disabledInput" type="text" placeholder="" disabled>
                                    </div>
                                    <div class="form-group">
                                            <label>Text area</label>
                                            <textarea class="form-control" rows="4"></textarea>
                                    </div>
                                </fieldset>
                        
                    </div>
                    <br>
                    <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg">Registrar Abonado</button>
                            <button type="reset" class="btn btn-primary btn-lg">Limpiar Campos</button>
                            </div>
                    {!!Form::close([''])!!}
                    <br>

                    @if(Session::has('mensaje'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{Session::get('mensaje')}}
                    </div>
                     @endif
            </div>
            <!-- /.panel-body -->

        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
@endsection
@section('title')
    SysParking - Registro de Abonados
@endsection