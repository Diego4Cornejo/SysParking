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
                        <a href="{{ url('/delete') }}"><button type="button" class="btn btn-danger">Si</button></a>
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
                                {!!Form::open(['route' => 'abonados.store','method' => 'POST'])!!}
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
                                                <input type="text" class="form-control input-lg text-center">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-success input-lg" type="button"><i class="fa fa-search"></i> Buscar
                                                    </button>
                                                </span>
                                            </div>
                                    </div>
                                
                                {!!Form::close([''])!!}
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