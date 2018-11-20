<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    <link href="http://allfont.net/allfont.css?fonts=fake-receipt" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
   
<style type="text/css" media="all">
body.receipt .sheet { margin-left: 0px; 
width: 90mm; 
height: 100mm;
}
 /* change height as you like */
@media print { body.receipt { width: 58mm } } /* this line is needed for fixing Chrome's bug */
html {
  font-family: 'Fake Receipt', arial;
}
table{
    margin-left:10px; 
    margin-top:10px;
    margin-bottom:10px;
    
}
th{
    padding: 10px;
    font-size: 14px;
}
td{
    padding: 7px;
    font-size: 12px;
}
.item{
    text-align: right;
}
.item2{
    text-align: center;
}
.codebar{
    margin-left: 27px;
}
</style>
</head>
<body class="receipt">
        <section class="sheet padding-10mm">
                <table align="center">
                    <thead>
                        <tr>
                            <th colspan="2">Ingreso Clinica RedSalud Mayor de Temuco</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Fecha de Ingreso:</td>
                            <td class="item">{{ $fecha }}</td>    
                        </tr>
                        <tr>
                            <td>Hora de Ingreso:</td>
                            <td class="item">{{ $hora }}</td>    
                        </tr>
                        <tr>
                            <td>Tipo de Ingreso:</td>
                            <td class="item">{{ $voucher -> TARIFAS_TIPODEATENCION }}</td>    
                        </tr>
                    <tr>
                        <td colspan="2"><center> {!! DNS1D::getBarcodeHTML($codvoucher, "C128",2,44)  !!}</center> </td>
                    </tr>
                    <tr>
                    <td colspan="2" class="item2">Recuerde no dejar pertenencias de valor dentro del vehiculo</td>
                    </tr>
                    </tbody>
                </table>
    </section>
</body>
</html>