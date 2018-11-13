@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Abonados</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Abonados Registrados
            </div>
            <div class="panel-body">
                    <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Rut</th>
                                        <th>Numero Telefonico</th>
                                        <th>Correo Electronico</th>
                                        <th>Estado de Abonado</th>
                                        <th>Patente</th>
                                        <th>Plan</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @forelse ($listadeabonados as $lista)
                                            <tr>  
                                                <td>{{ $lista -> AB_NOMBRE }}</td>
                                                <td>{{ $lista -> AB_RUN }}</td>
                                                <td>{{ $lista -> AB_NUMERODETELEFONO }}</td>
                                                <td>{{ $lista -> AB_CORREO }}</td>
                                                <td>{{ $lista -> AB_ESTADO }}</td>
                                                <td>{{ $lista -> AB_PATENTE }}</td>
                                                <td>{{ $lista -> PLAN_NOMBRE }}</td>
                                                <td class="text-center"><a href="{{ url('/abonado/' . $lista->ABONADO_ID . '/edit') }}"><button  type="button" class="btn btn-info btn-block" value="{{ $lista -> ABONADO_ID }}" > <i class="fa fa-pencil fa-fw"></i></button></a></td>
                                                <td class="text-center"><button type="button" class="btn btn-danger btn-block" value="{{ $lista -> ABONADO_ID }}"><i class="fa fa-trash fa-fw"></i></button></td>
                                            </tr>
                                        @empty
    
                                        @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
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
    SysParking - Lista de Abonados
@endsection