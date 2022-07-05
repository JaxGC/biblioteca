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
    <div class="table-responsive">
        <table  border="2" cellpadding="7" cellspacing="0" style="width:100%">
                @foreach ($rangoPdf as $var)
                <tr>
                    <td>{{$var->id}}</td>
                    <td>{{$var->fecha_inicio}}</td>
                    <td>{{$var->name}}</td>
                    <td>{{$var->Nombre_libro}}</td>
                </tr>
            @endforeach
        </table>
        
    </div>
</body>
</html>