@extends('navbar')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"> Inicio </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                    <i class="fa  fa-home  fa-fw"></i> Panel
            </div>
            <div class="panel-body">
                    
                    <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-perso4">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-automobile fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                @forelse ($estacionados as $estacionado)
                                                <div class="huge">{{ $estacionado -> estacionados }}</div>
                                                @empty
        
                                                @endforelse
                                                <div>Vehiculos estacionados</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#">
                                        <div class="panel-footer">
                                            <span class="pull-left">Ver detalles</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-perso">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-group fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                    @forelse ($abonados as $abonado)
                                                    <div class="huge">{{ $abonado -> abonados }}</div>
                                                    @empty
            
                                                    @endforelse
                                                <div>Abonados registrados</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#">
                                        <div class="panel-footer">
                                            <span class="pull-left">Ver detalles</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-perso2">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-wrench fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                    @forelse ($operadores as $operador)
                                                    <div class="huge">{{ $operador -> operadores }}</div>
                                                    @empty
                                                    @endforelse
                                                <div>Operadores Registrados</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#">
                                        <div class="panel-footer">
                                            <span class="pull-left">Ver detalles</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-perso3">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-bell fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class="huge">0</div>
                                                <div>Alertas</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#">
                                        <div class="panel-footer">
                                            <span class="pull-left">Ver detalles</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="jumbotron jumbotron-fluid">
                                <div class="container">
                                  <h3 class="display-4">Bienvenido : <i class="fa fa-user fa-fw"></i> TeamSysParking</h3>
                                  <p class="lead">Como <i class="fa fa-wrench fa-fw"></i> Supervisor tienes acceso a los siguientes modulos:</p>
                                  <ul class="list-group">
                                        <li class="list-group-item">Ingreso de Vehiculos</li>
                                        <li class="list-group-item">Consulta de Vehiculos</li>
                                        <li class="list-group-item">Graficos y Reportes</li>
                                        <li class="list-group-item">Gestion de Abonados</li>
                                        <li class="list-group-item">Gestion de Operadores</li>
                                    </ul>
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
    SysParking - Inicio
@endsection