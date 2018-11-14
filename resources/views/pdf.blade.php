<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    <link href="css/pdfview" rel="stylesheet">
</head>
<body>
    <div>
        <h1>Ingreso por usuario</h1>
        <div>
            <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Rut</th>
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