@extends('layouts.app')

@section('content')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
     google.charts.load('current', {'packages':['corechart']});
     google.charts.setOnLoadCallback(drawChart);
          
     function drawChart() {
          
     var data = google.visualization.arrayToDataTable([
        ['Tipo de Entreda', 'Veces'],
        @forelse ($entradas as $entrada)
          ['{{ $entrada -> TARIFAS_TIPODEATENCION}}' ,  {{ $entrada -> VECES}}], 
        @empty

        @endforelse 
        ]);
          
        var options = {
            title: 'Tipos de Entradas'
        };
          
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
          
        chart.draw(data, options);
        }
</script>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"> Graficos y Reportes </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
        <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw"></i> Ingreso por tipo de atencion
                       
                        <div class="pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    Reporte
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li><a href="#">Generar Excel</a>
                                    </li>
                                    <li><a href="pdf">Generar PDF</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                            <div id="piechart" style="width: 700px; height: 500px;"></div>
                    <div id="tabs">
                            <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab">tab1</a></li>
                            <li><a href="#tab2" data-toggle="tab">tab2</a></li>
                            <li><a href="#tab3" data-toggle="tab">tab3</a></li>
                            </ul>
                            <div class="tab-content">           
                            <!--tabcontent-->
                            <div class="tab-pane fade" id="tab1">

                            <div class="col-md-9">
                             <div class="tab-content"> 
                              <div class="tab-pane fade in active" id="tab11" >
                              </div>
                            </div><!--tab-content -->
                            </div><!--F9 -->
                            </div><!--FIN TAB MANEJO -->
                            <!---------------------------------------------------------->
                            <div class="tab-pane fade" id="tab2">
                            <div class="col-md-9">
                             <div class="tab-content">
                              <div class="tab-pane fade in active" id="tab22" >
                              </div>
                            </div><!--tab-content -->
                            </div><!--F9 -->
                            </div><!--FIN TAB MANEJO -->
                            <!---------------------------------------------------------->
                            <div class="tab-pane fade" id="tab3">
                            <div class="col-md-9">
                             <div class="tab-content">
                              <div class="tab-pane fade in active" id="tab33" >
                              </div>
                            </div><!--tab-content -->
                            </div><!--F9 -->
                            </div><!--FIN TAB MANEJO -->
                            <!---------------------------------------------------------->
                        </div><!--fin tabs-CONTENT -->
                        </div>  <!--fin tabs -->
                    </div>
                </div>
        </div>      
</div>
<!-- /.row -->
@endsection
@section('title')
    SysParking - Graficos
@endsection