@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Operadores</h2>
    </div>
   <!-- <div class="col-md-4 col-md-offset-18">
        <a href="{/{ url('/register') }}"><button  type="button" class="btn btn-primary "> Registar Nuevo Operador <i class="fa fa-plus fa-fw"></i></button></a>
    </div>-->
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<br>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                    <i class="fa fa-user-md fa-fw"></i> Operadores Registrados
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
                                        <th>Cargo</th>
                                        <th>Jornada</th>
                                        <th>Fecha de Registro</th>
                                        <th>Editar  </th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @forelse ($listadeoperadores as $lista)
                                            <tr>  
                                                <td>{{ $lista -> name }}</td>
                                                <td>{{ $lista -> US_RUT }}</td>
                                                <td>{{ $lista -> US_TELEFONO }}</td>
                                                <td>{{ $lista -> email }}</td>
                                                <td>{{ $lista -> CAR_NOMBRE }}</td>
                                                <td>{{ $lista -> CAR_JORNADA }}</td>
                                                <td>{{ $lista -> created_at }}</td>
                                                <td class="text-center"><a href="{{ url('/abonado/' . $lista->id . '/edit') }}"><button  type="button" class="btn btn-success btn-block" value="{{ $lista -> id }}" > <i class="fa fa-pencil fa-fw"></i></button></a></td>
                                                <td class="text-center"><button type="button" class="btn btn-danger btn-block remove" data-toggle="modal" data-target="#myModal" value="{{ $lista -> id }}"><i class="fa fa-trash fa-fw"></i></button></a></td>
                                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title" id="myModalLabel">Alerta</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                ¿Deseas Eliminar al abonado {{ $lista -> name }}?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                <a href="{{ url('/abonado/' . $lista->id . '/delete') }}"><button type="button" class="btn btn-danger">Eliminar</button><a>
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