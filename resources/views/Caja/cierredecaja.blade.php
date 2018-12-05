@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Cierre de caja  </h2>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Formulario de cierre de cajas
            </div>
            <div class="panel-body">
                <div class="col-md-6">
                    {{ Form::open(array('method'=>'PUT','route' => ['caja.update', $id])) }}
                     <input type="hidden" value="{{ date("Y-m-d H:i:s") }}" name="FECHA_CIERRE" />
                     <br>
                     <div class="form-group">
                         <fieldset disabled>
                                    <div class="form-group">
                                        <label for="disabledSelect">Nombre del Cajero:</label>
                                        <input class="form-control" id="disabledInput" type="text" placeholder="{{ Auth::user()->name }} {{ Auth::user()->US_APELLIDO }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="disabledSelect">Fecha y Hora de Apertura  :</label>
                                        <input class="form-control" id="disabledInput" type="text" placeholder="{{ $fecha }} {{ $hora }}" disabled>
                                    </div>
                                    <div class="form-group">
                                            <label for="disabledSelect">Fecha y Hora de Cierre  :</label>
                                    <input class="form-control" id="disabledInput" name="FECHA_CIERRE" type="text" placeholder="{{ date('d-m-Y') }} {{ date('H:i') }}"  disabled>
                                    </div>
                                    <label>Monto Inicial de Apertura</label>
                                    <div class="form-group input-group">
                                        
                                        <span class="input-group-addon"> $ </span>
                                    <input type="text" name="MONTO_CIERRE" class="form-control" placeholder=" {{ $montoinicial }}">
                                </div>
                                <label>Total Calculado:</label>
                                <div class="form-group input-group">
                                        
                                        <span class="input-group-addon">$</span>
                                <input type="text" name="MONTOTOTALCALCULADO" class="form-control" placeholder="{{ $montocalculado }}">
                                </div>
                        </fieldset> 
                        <label>Monto Total:</label>
                        <div class="form-group input-group">
                                
                                <span class="input-group-addon">$</span>
                                <input type="text" name="MONTO_CIERRE" class="form-control" required>
                        </div>
                     </div>
                     <div class="text-center">
                     <button type="submit" class="btn btn-success btn-lg" >Cerrar Caja  </button>
                     </div>
                </div>
                {!!Form::close([''])!!}
            <div class="col-md-6">
                    <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th colspan="2" class="text-center"><h2>Contador de Billetes</h2></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>  
                                    <td> $ 20000: </td>
                                    <td> <input type="number" name="MONTO_CIERRE" class="form-control"> </td>
                                </tr>
                                <tr>  
                                    <td> $ 10000: </td>
                                    <td> <input type="number" name="MONTO_CIERRE" class="form-control"> </td>
                                </tr>
                                <tr>  
                                    <td> $ 5000: </td>
                                    <td> <input type="number" name="MONTO_CIERRE" class="form-control"> </td>
                                </tr>
                                <tr>  
                                    <td> $ 2000: </td>
                                    <td> <input type="number" name="MONTO_CIERRE" class="form-control"> </td>
                                </tr>
                                <tr>  
                                    <td> $ 1000 </td>
                                    <td> <input type="number" name="MONTO_CIERRE" class="form-control"> </td>
                                </tr>
                                <td> $ 500 </td>
                                <td> <input type="number" name="MONTO_CIERRE" class="form-control"> </td>
                                </tr>
                                <tr>  
                                <td> $ 50 :</td>
                                <td> <input type="number" name="MONTO_CIERRE" class="form-control"> </td>
                                </tr>
                                <tr>  
                                    <td> $ 10 :</td>
                                    <td> <input type="number" name="MONTO_CIERRE" class="form-control"> </td>
                                </tr>
                                <tr>  
                                    <td><h4> Total: </h4></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
            </div>
            <!-- /.panel-body -->
        </div>
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
@endsection
@section('title')
    SysParking - Cierre de caja
@endsection