@extends('navbar')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"> Ingreso de Vehiculos </h3>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Formulario de registro de ingreso de vehiculos
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6"> 
                            <form role="form">
                                    <div class="form-group">
                                        <label>Patente del Vehiculo</label>
                                        <input class="form-control" placeholder="Ingrese Patente EJ: VXDJ02 o vxdj02">
                                    </div>
                                    <div class="form-group">
                                            <label>Tipo de Atención</label>
                                            <select class="form-control">
                                                <option>Seleccionar...</option>
                                                @forelse ($tarifas as $tarifa)
                                                    <option>{{ $tarifa -> TARIFAS_TIPODEATENCION }}</option>
                                                @empty
        
                                                @endforelse
                                            </select>
                                        </div>
                                    <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Generar Boucher</button>
                                    <button type="reset" class="btn btn-primary">Limpiar Campos</button>
                                    </div>
                                </form>               
                    </div>
                    <br>
                    <div class="col-md-6"> <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Tipo de atención</th>
                                            <th>Cobro de atención</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($tarifas as $tarifa)
                                        <tr>  
                                            <td>{{ $tarifa -> TARIFAS_TIPODEATENCION }}</td>
                                            <td>{{ $tarifa -> TARIFAS_COBRODEATENCION }}</td>
                                        </tr>
                                        @empty

                                        @endforelse
                                    </tbody>
                                </table>
                        </div>
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
    SysParking - Ingreso
@endsection