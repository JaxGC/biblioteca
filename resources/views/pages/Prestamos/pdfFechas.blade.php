<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Documento PDF</title>
  {{--   @extends('layouts.app') --}}

</head>
<body>
    <div>
        <table cellpadding="7" cellspacing="0">
            <tr>
                <td><img src="../resources/views/pages/Prestamos/logo.png" width="120" height="100"></td>
                <td colspan="3"><strong><center>LISTADO DE PRESTAMOS</center></strong></td>
                <td><img src="../resources/views/pages/Prestamos/blue.png" width="100" height="55"></td>
            </tr>
            <tr>
                <td colspan="5">_______________________________________________________________________________________</td>
            </tr>
        </table>
    </div>
    <center>UNIVERSIDAD MEXIQUENSE DEL BICENTENARIO</center>
    <center>PLANTEL VILLA VICTORIA</center><br>
    <div class="table-responsive">
        <table  border="2" cellpadding="7" cellspacing="0" style="width:100%">
            @foreach ($rangoPdf as $var)    
                <tr>
                    <td colspan="5"  align="center" style="background-color: rgba(105, 105, 105, 0.61)"># ADQUISICIÓN</td>
                    <td colspan="1">{{$var->id}}</td>
                </tr>
                <tr>
                    <td rowspan="2">FECHA PRESTAMO</td>
                    <td rowspan="2">{{$var->fecha_inicio}}</td>
                    <td>NOMBRE USUARIO</td>
                    <td colspan="3">{{$var->name}}</td>
                    
                </tr>
                <tr>
                    <td>NOMBRE LIBRO</td>
                    <td colspan="3">{{$var->Nombre_libro}}</td>
                </tr>
            @endforeach
        </table>
        
    </div>
</body>
</html>