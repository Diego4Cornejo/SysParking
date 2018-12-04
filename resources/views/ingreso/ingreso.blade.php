@extends('layouts.app')

@section('content')
<script>
function printExternal(url) {
    //var printWindow = window.open( url, 'Print', 'left=200, top=200, width=300, height=300, toolbar=0, resizable=0');
    var printWindow = window.open( url, '_blank', 'toolbar=no,status=no,menubar=no,scrollbars=no,resizable=no,left=10000, top=10000, width=300, height=300, visible=none', '');
    printWindow.addEventListener('load', function(){
        printWindow.print();
        printWindow.close();
    }, true);
}
</script>
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header"> Ingreso de Vehiculos </h2>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- -->
<!-- /.row -->
<!-- Mensaje-->
<!-- -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                    <i class="fa fa-automobile fa-fw"></i> Formulario de registro de ingreso de vehiculos
            </div>
            <div class="panel-body">

                <div class="row">
                    <div class="col-md-6"> 
                            <!--<form role="form" method="POST" action="url('ingreso/create')">-->
                                {!!Form::open(['route' => 'ingreso.store','method' => 'POST'])!!}
                               <!-- <div class="form-group text-center">
                                <label>Ingreso  :     </label>
                                <label class="radio-inline input-lg">
                                <input type="radio" name="OPCIONES" id="OPCIONES1" value="option1" checked>Cliente Normal
                                </label>
                                <label class="radio-inline input-lg">
                                <input type="radio" name="OPCIONES" id="OPCIONES2" value="option2">Abonado
                                </label>
                                <label class="radio-inline">
                                </div>-->
                                <br>
                                <div class="form-group">
                                    <h4><label class="">Patente del Vehiculo</label></h4>
                                    <input class="form-control input-lg" name="EST_PATENTE" maxlength="6" autocomplete="off"  placeholder="Ejemplo: VXDJ02 o vxdj02" required>
                                </div>
                                <div class="form-group">
                                        <h4><label>Tipo de Atención</label></h4>
                                        <select name="idtarifa" id="idtarifa" type="text" class="form-control input-lg" required>
                                            <option value="" selected disabled hidden>Seleccionar..</option>
                                            @forelse ($tarifas as $tarifa)
                                                <option value="{{$tarifa -> ID_TARIFA}}"name="EST_TIPODEATENCION">{{ $tarifa -> TARIFAS_TIPODEATENCION }}</option>
                                            @empty
            
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-lg" >Generar Boucher</button>
                                    </div>
                            
                                
                           
                            {!!Form::close([''])!!}
                                <!-- Mensaje-->
                                <br>
                            @if(Session::has('ingresado'))
                            <div  class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <script> printExternal('voucher');</script>
                                {{Session::get('ingresado')}}
                            </div>
                            @endif
<!-- -->
                    </div>
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