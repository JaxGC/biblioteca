<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Documento PDF</title>
    @extends('layouts.app')

</head>
<body>
    <div class="table-responsive">
        <table id="example" class="table table-bordered table-striped display" style="width:100%">
            <thead class="thead-dark">
                <tr>
                <th>ID</th>
                <th>Nombre Completo de Administrador</th>
                <th class="border px-4 py-2">IMAGEN</th>
                </tr>
            </thead>
            
            <tbody>
            
                @foreach ($varAdmin as $var)
                <tr>
                <td>{{$var->id}}</td>
                <td>{{$var->name}}</td>
                <td  class="border px-14 py-1">
                    <img src="/imagen/{{$var->imagen_usuario}}" width="10%">
                </td>
                
            </tr>
            @endforeach
            </tbody> 
            
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Nombre Completo de Administrador</th>
                    <th class="border px-4 py-2">IMAGEN</th>
                </tr>
            </tfoot> 
        </table>
        
    </div>
</body>
</html>