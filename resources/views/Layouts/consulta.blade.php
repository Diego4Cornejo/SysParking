@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header"> Consulta de Vehiculos </h2>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                    <i class="fa fa-qrcode fa-fw"></i> Formulario de consulta por vehiculo
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3"> 
                            {!!Form::open(['route' => 'ingreso.store','method' => 'POST'])!!}
                                <div class="form-group">
                                    <h4><label>Patente del Vehiculo</label></h4>
                                    <input class="form-control input-lg" name="CON_PATENTE" maxlength="6" autocomplete="off"  placeholder="Ingrese Patente EJ: VXDJ02 o vxdj02">
                                </div>
                                <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Realizar Consulta</button>
                                <button type="reset" class="btn btn-primary btn-lg">Limpiar Campos</button>
                                </div>
                            {!!Form::close([''])!!} 
                    </div>
                    <br>
                    <div class="col-md-6">
                        @yield('detalles')
                        <!-- /.table-responsive -->
                    </div>
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
    SysParking - Consulta
@endsection