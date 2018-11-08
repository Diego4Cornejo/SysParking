@extends('navbar')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Registro de Abonados</h3>
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
                    <form role="form" action={{url('abonado/registrar')}}>
                            <br>
                            <div class="form-group">
                                <label>Nombre Completo :</label>
                                <input class="form-control" placeholder="Nombre Completo">
                            </div>
                            <div class="form-group">
                                    <label>Rut :</label>
                                    <input class="form-control" placeholder="19604399-4">
                            </div>
                            <div class="form-group">
                                    <label>Sexo :</label>
                                    <select class="form-control">
                                        <option>Seleccionar..</option>
                                        <option>Masculino</option>
                                        <option>Femenino</option>
                                        <option>Otro</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                    <label>Correo Electronico :</label>
                                    <input class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                    <label>Numero Telefonico :</label>
                                    <input class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <br>
                            <div class="form-group">
                                    <label>Patente del Vehiculo :</label>
                                    <input class="form-control" name="EST_PATENTE" maxlength="6" autocomplete="off"  placeholder="Ingrese Patente EJ: VXDJ02 o vxdj02">
                            </div>
                            <div class="form-group">
                                    <label>Tipo de Plan :</label>
                                    <select name="idtarifa" id="idtarifa" type="text" class="form-control">
                                        <option>Seleccionar...</option>
                                        @forelse ($planes as $plan)
                                            <option value="{{$plan -> ID_PLAN}}"name="EST_TIPODEATENCION">{{ $plan -> PLAN_NOMBRE }}  ${{ $plan -> PLAN_PRECIO }} </option>
                                        @empty
        
                                        @endforelse
                                    </select>
                                </div>
                            <div class="text-center">
                            <button type="submit" class="btn btn-primary">Registrar Abonado</button>
                            <button type="reset" class="btn btn-primary">Limpiar Campos</button>
                            </div>
                        </form>
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
    SysParking - Registro de Abonados
@endsection