@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Apertura de Caja </h2>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Formulario de apertura de caja
            </div>
            <div class="panel-body">
                <div class="col-md-6">
                    {!!Form::open(['route' => 'caja.store','method' => 'POST'])!!}
                     <br>
                     <div class="form-group">
                         <fieldset disabled>
                                    <div class="form-group">
                                        <label for="disabledSelect">Nombre del Cajero:</label>
                                        <input class="form-control" id="disabledInput" type="text" placeholder="{{ Auth::user()->name }} {{ Auth::user()->US_APELLIDO }}" disabled>
                                    </div>
                                    <div class="form-group">
                                            <label for="disabledSelect">Fecha :</label>
                                            <input class="form-control" id="disabledInput" type="text" placeholder="{{ date('d-m-Y') }}" disabled>
                                    </div>
                                    <div class="form-group">
                                            <label for="disabledSelect">Hora :</label>
                                            <input class="form-control" id="disabledInput" type="text" placeholder="{{ date('H:i') }}" disabled>
                                    </div>
                        </fieldset> 
                        <label>Monto Inicial de apertura:</label>
                        <div class="form-group input-group">
                                
                                <span class="input-group-addon">$</span>
                                <input type="text" name="MONTO_APERTURA" class="form-control">
                        </div>
                     </div>
                     <div class="text-center">
                     <button type="submit" class="btn btn-success btn-lg" >Abrir Caja  </button>
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
    SysParking - Apertura
@endsection