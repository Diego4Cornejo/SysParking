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
    <div><img src="./svg/logopng.png" alt="Smiley face" height="70" width="70"> <h2>Reporte por tipo de visita:</h2></div>
    <div>
        <div>
            <table border="1" align="center">
                    <thead>
                        <tr>
                            <th>Tipo de visita </th>
                            <th>Cantidad de Ingresos:</th>
                        </tr>
                    </thead>
                    <tbody>
                            @forelse ($entradas as $entrada)
                                <tr>  
                                    <td>{{ $entrada -> TARIFAS_TIPODEATENCION }}</td>
                                    <td>{{ $entrada -> VECES }}</td>
                                </tr>
                            @empty

                            @endforelse
                <!-- Modal -->
                    </tbody>
                </table>
        </div>
</body>
</html>