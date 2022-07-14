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
    <div class="table-responsive">
        <table id="example" class="table table-bordered table-striped display" style="width:100%">
            <thead class="thead-dark">
                <tr>
                <th>Codigo</th>
                <th>Nombre Completo de Administrador</th>
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