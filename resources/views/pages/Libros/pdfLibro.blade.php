<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Documento PDF</title>
 {{--    @extends('layouts.app') --}}

</head>
<body>
<div>
    <table cellpadding="7" cellspacing="0">
        <tr>
            <td><img src="../resources/views/pages/Prestamos/logo.png" width="120" height="100"></td>
            <td colspan="3"><strong><center>LISTADO DE LIBROS</center></strong></td>
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
        <table border="2" cellpadding="7" cellspacing="0" id="example" class="table table-bordered table-striped display" style="width:100%">
            <thead class="thead-dark">
                <tr>
                <th>Codigo</th>
                <th>Nombre Completo de Libro</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($varlib as $var)
                <tr>
                    <td>{{$var->codigo}}</td>
                    <td>{{$var->Nombre_libro}}</td>
                </tr>
                @endforeach
            </tbody> 
        </table>
    </div>
</body>
</html>