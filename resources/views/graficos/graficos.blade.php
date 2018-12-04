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
        };
        google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawCharta);
    
    function drawCharta() {
      var data = google.visualization.arrayToDataTable([
        ["Año", "Total de Ventas", { role: "style" } ],
        ["2018", {{ $ventas }}, "#0000ff"],
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Ventas Anuales",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
</script>
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header"> Graficos y Reportes </h2>
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
                                    <li><a href="pdf" target="_blank" >Generar PDF</a>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                           <div id="piechart" style="width: 700px; height: 500px;"></div>
                    </div>
                </div>
        </div>    
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Ventas
                   
                    <div class="pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                Reporte
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li><a href="#">Generar Excel</a>
                                </li>
                                <li><a href="pdf" target="_blank" >Generar PDF</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div id="columnchart_values" style="width: 700px; height: 500px;"></div>

                </div>
            </div>
    </div>     
</div>
<!-- /.row -->
@endsection
@section('title')
    SysParking - Graficos
@endsection