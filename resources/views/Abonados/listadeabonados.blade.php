@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Abonados Registrados</h2>
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
                                        <th>Editar  </th>
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
                                                <td class="text-center"><a href="{{ url('/abonado/' . $lista->ABONADO_ID . '/edit') }}"><button  type="button" class="btn btn-success btn-block" value="{{ $lista -> ABONADO_ID }}" > <i class="fa fa-pencil fa-fw"></i></button></a></td>
                                                <td class="text-center"><button type="button" class="btn btn-danger btn-block remove" data-toggle="modal" data-target="#myModal" value="{{ $lista -> ABONADO_ID }}"><i class="fa fa-trash fa-fw"></i></button></a></td>
                                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title" id="myModalLabel">Alerta</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                ¿Deseas Eliminar al abonado {{ $lista -> AB_NOMBRE }}?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                <a href="{{ url('/abonado/' . $lista->ABONADO_ID . '/delete') }}"><button type="button" class="btn btn-danger">Eliminar</button><a>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->
                                            </tr>
                                        @empty
    
                                        @endforelse
                            <!-- Modal -->
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
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
    SysParking - Lista de Abonados
@endsection