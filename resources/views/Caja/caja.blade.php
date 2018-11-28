@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Caja </h2>
    </div>
    <div class="col-md-4 col-md-offset-18">
        <button type="button" class="btn btn-danger remove" data-toggle="modal" data-target="#myModal" value=""> Realizar cierre de caja </button></a>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Alerta</h4>
                    </div>
                    <div class="modal-body">
                        ¿Deseas Proceder al cierre de caja ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <a href="{{ url('/cierredecaja') }}"><button type="button" class="btn btn-danger">Si</button></a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<br>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Formulario de pago de vehiculos estacionados
            </div>
            <div class="panel-body">
                <div class="col-md-6"> 
                            <!--<form role="form" action={//{url('abonado/registrar')}}> -->
                                    <br>
                                    <div class="form-group">
                                            <label>Realizar consulta por  :</label>
                                            <div class="text-center">
                                            <label class="radio-inline input-lg">
                                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline1" value="option1" checked> Voucher
                                            </label>
                                            <label class="radio-inline input-lg">
                                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline2" value="option2"> Patente
                                            </label>
                                            </div>
                                        </div>
                                    <div class="form-group">
                                        <label>Patente o Código de Voucher :</label>
                                        <div class="form-group input-group">
                                                <input id="patente" type="text" name="patente" maxlength="8" class="form-control input-lg text-center">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-success input-lg" type="submit"><i class="fa fa-search"></i> Buscar
                                                    </button>
                                                </span>
                                                
                                            </div>
                                    </div>
                                
                                {!!Form::close([''])!!}
                </div>
                
                <div class="col-md-6"> 
                    
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th colspan="2" class="text-center"><h2>Datos Vehiculo</h2></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>  
                                <td>Patente del Vehiculo o COD: </td>
                                <td>TH2424</td>
                            </tr>
                            <tr>  
                                <td> Hora de Ingreso: </td>
                                <td></td>
                            </tr>
                            <tr>  
                                <td> Fecha de Ingreso: </td>
                                <td></td>
                            </tr>
                            <tr>  
                                <td> Tipo de Ingreso: </td>
                                <td></td>
                            </tr>
                            <tr>  
                                    <td> Duracion de estadia:</td>
                                    <td></td>
                                </tr>
                            <tr>  
                                <td><h4> Cobro: </h4></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
               
   
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
    SysParking - Caja
@endsection