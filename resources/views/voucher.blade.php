<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    <style type="text/css" media="all">
        
html {
  font-family: 'helvetica neue', helvetica, arial, sans-serif;
}

thead th, tfoot th {
  
}
table{
    
}

th {
  letter-spacing: 2px;
  padding: 10px;
}

td {
  letter-spacing: 1px;
  padding: 10px;
}

tbody td {
  text-align: center;
}

tfoot th {
  text-align: right;
}
</style>
</head>
<body>
        <div id="elem">
                <table border="1">
                    <thead>
                        <tr>
                            Bienvenido
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Fecha de Ingreso:<td>
                            <td>{{ date('Y-m-d') }}</td>    
                        </tr>
                        <tr>
                            <td>Hora de Ingreso:<td>
                            <td>{{ date('H:i:s') }}</td>    
                        </tr>
                            <td>Tipo de Ingreso:<td>
                            <td>{{ date('H:i:s') }}</td>    
                        </tr>
                        @forelse ($voucher as $vou)
                        <tr>  
                            <td>{{ $vou }}</td>
                            <td></td>
                        </tr>
                    @empty

                    @endforelse
                    </tbody>
                </table>
                <td colspan="2">{!! DNS1D::getBarcodeHTML("4445645656", "C39")  !!}<td>
        </div> 
</body>
</html>