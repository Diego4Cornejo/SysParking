@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"> Consulta de Vehiculos </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Formulario de consulta por vehiculo
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3"> 
                            <form role="form" action="{{}}">
                                <div class="form-group">
                                    <h4><label>Patente del Vehiculo</label></h4>
                                    <input class="form-control input-lg" name="CON_PATENTE" maxlength="6" autocomplete="off"  placeholder="Ingrese Patente EJ: VXDJ02 o vxdj02">
                                </div>
                                <div class="text-center">
                                <button type="submit" class="btn btn-primary">Realizar Consulta</button>
                                <button type="reset" class="btn btn-primary">Limpiar Campos</button>
                                </div>
                            </form>   
                    </div>
                    <br>
                    <div class="col-md-6"> <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    </thead>
                                    <tbody>
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
    SysParking - Consulta
@endsection