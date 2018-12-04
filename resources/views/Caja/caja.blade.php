@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Caja </h2>
    </div>
    <div class="col-md-4 col-md-offset-18">
        <button type="button" class="btn btn-danger remove" data-toggle="modal" data-target="#myModal" value=""> Realizar cierre de caja </button></a>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Alerta</h4>
                    </div>
                    <div class="modal-body">
                        ¿Deseas Proceder al cierre de caja ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <a href="{{ url('/cierredecaja') }}"><button type="button" class="btn btn-danger">Si</button></a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<br>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Formulario de pago de vehiculos estacionados
            </div>
            <div class="panel-body">
                @if(Session::has('mensaje'))
                <div class="col-md-6"> 
                        {{ Form::open(array('method'=>'PUT','route' => ['abonados.update', $datosvehiculo -> ID_ESTACIONADO])) }}
                        <fieldset disabled>
                        <div class="form-group">
                                <label>Realizar consulta por  :</label>
                                <div class="text-center">
                                <label class="radio-inline input-lg">
                                    <input type="radio" name="consultapor" id="optionsRadiosInline1" value="Voucher" {{ $voucher }}> Voucher
                                </label>
                                <label class="radio-inline input-lg">
                                    <input type="radio" name="consultapor" id="optionsRadiosInline2" value="Patente" {{ $patente }}> Patente
                                </label>
                                </div>
                            </div>
                        <div class="form-group">
                            <label>Patente o Código de Voucher :</label>
                        <input class="form-control input-lg text-center" name="PATENTE_CODVOU" maxlength="8" autocomplete="off"  placeholder="{{ $patentecod }}">
        
                        </div>
                        <div class="form-group">
                            <label>¿Presenta Documentos Correspondientes?  :</label>
                            <div class="text-center">
                            <label class="radio-inline input-lg">
                                <input type="radio" onclick="javascript:yesnoCheck();" name="Documentos" id="Si" value="Si" checked> Si
                            </label>
                            <label class="radio-inline input-lg">
                                <input type="radio" name="Documentos" onclick="javascript:yesnoCheck();" id="No" value="No"> No
                            </label>
                            </div>
                        </div>
                        <div class="form-group" id="ifYes" style="display:none">
                            <label>Seleccionar nuevo tipo de Atención: </label>
                            <select name="idtarifa" id="idtarifa" type="text" class="form-control input-lg">
                                <option>Seleccionar...</option>
                                @forelse ($tarifas as $tarifa)
                                    <option value="{{$tarifa -> ID_TARIFA}}"name="EST_TIPODEATENCION">{{ $tarifa -> TARIFAS_TIPODEATENCION }}</option>
                                @empty
        
                                @endforelse
                            </select>
                        </div>
                        </fieldset>
                        <div class="form-group text-center">
                            <button class="btn btn-primary input-lg " type="submit"><i class="fa fa-dollar"></i> Generar Cobro </button>
                            <a href="/caja"><button class="btn btn-success input-lg "><i class="fa fa-search"></i> Volver a Consulta </button></a>
                        </div>
                        <script type="text/javascript">
        
                            function yesnoCheck() {
                                if (document.getElementById('No').checked) {
                                    document.getElementById('ifYes').style.display = 'block';
                                }
                                else document.getElementById('ifYes').style.display = 'none';
                            
                            }
                            
                        </script>
              
        
                    
                    {!!Form::close([''])!!}
                    </div>
                    <div class="col-md-6">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th colspan="2" class="text-center"><h2>Datos Vehiculo</h2></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>  
                                <td>Patente del Vehiculo o COD: </td>
                                <td>{{ $datosvehiculo -> EST_PATENTE }}</td>
                            </tr>
                            <tr>  
                                <td> Hora de Ingreso: </td>
                            <td>{{ $horaingreso }}</td>
                            </tr>
                            <tr>  
                                <td> Fecha de Ingreso: </td>
                                <td> {{ $fechaingreso }} </td>
                            </tr>
                            <tr>  
                                <td> Hora de Salida: </td>
                                <td>{{ $horasalida }}</td>
                                </tr>
                                <tr>  
                                    <td> Fecha de Salida: </td>
                                    <td> {{ $fechasalida }} </td>
                                </tr>
                            <tr>  
                                <td> Tipo de Ingreso: </td>
                                <td> {{ $datosvehiculo -> TARIFAS_TIPODEATENCION }} </td>
                            </tr>
                            <tr>  
                                    <td> Duracion de estadia Efectiva:</td>
                                    <td> {{ $duracion }} Minutos </td>
                                </tr>
                            <tr>  
                                <td><h4> Cobro: </h4></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @else
                <div class="col-md-6"> 
                    {!!Form::open(['action' => 'CajaController@consultar'])!!}
                        
                        <div class="form-group">
                                <label>Realizar consulta por  :</label>
                                <div class="text-center">
                                <label class="radio-inline input-lg">
                                    <input type="radio" name="consultapor" id="optionsRadiosInline1" value="Voucher" checked> Voucher
                                </label>
                                <label class="radio-inline input-lg">
                                    <input type="radio" name="consultapor" id="optionsRadiosInline2" value="Patente"> Patente
                                </label>
                                </div>
                            </div>
                        <div class="form-group">
                            <label>Patente o Código de Voucher :</label>
                            <input class="form-control input-lg text-center" name="PATENTE_CODVOU" maxlength="8" autocomplete="off"  placeholder="">

                        </div>
                        <div class="form-group">
                            <label>¿Presenta Documentos Correspondientes?  :</label>
                            <div class="text-center">
                            <label class="radio-inline input-lg">
                                <input type="radio" onclick="javascript:yesnoCheck();" name="Documentos" id="Si" value="Si" checked> Si
                            </label>
                            <label class="radio-inline input-lg">
                                <input type="radio" name="Documentos" onclick="javascript:yesnoCheck();" id="No" value="No"> No
                            </label>
                            </div>
                        </div>
                        <div class="form-group" id="ifYes" style="display:none">
                            <label>Tipo de Atención</label>
                            <select name="idtarifa" id="idtarifa" type="text" class="form-control input-lg">
                                <option>Seleccionar...</option>
                                @forelse ($tarifas as $tarifa)
                                    <option value="{{$tarifa -> ID_TARIFA}}"name="EST_TIPODEATENCION">{{ $tarifa -> TARIFAS_TIPODEATENCION }}</option>
                                @empty

                                @endforelse
                            </select>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-success input-lg " type="submit"><i class="fa fa-search"></i> Realizar Busqueda </button>
                        </div>
                        <script type="text/javascript">

                            function yesnoCheck() {
                                if (document.getElementById('No').checked) {
                                    document.getElementById('ifYes').style.display = 'block';
                                }
                                else document.getElementById('ifYes').style.display = 'none';
                            
                            }
                            
                        </script>
              

                    
                    {!!Form::close([''])!!}
                </div>
                <div class="col-md-6"> 
                    
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th colspan="2" class="text-center"><h2>Datos Vehiculo</h2></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>  
                                <td>Patente del Vehiculo o COD: </td>
                                <td> </td>
                            </tr>
                            <tr>  
                                <td> Hora de Ingreso: </td>
                                <td></td>
                            </tr>
                            <tr>  
                                <td> Fecha de Ingreso: </td>
                                <td></td>
                            </tr>
                            <tr>  
                                <td> Tipo de Ingreso: </td>
                                <td></td>
                            </tr>
                            <tr>  
                                    <td> Duracion de estadia:</td>
                                    <td></td>
                                </tr>
                            <tr>  
                                <td><h4> Cobro: </h4></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
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
    SysParking - Caja
@endsection