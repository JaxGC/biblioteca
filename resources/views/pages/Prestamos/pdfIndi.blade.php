<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Documento PDF</title>

</head>
<body>
    <div>
        <table cellpadding="7" cellspacing="0">
            <tr>
                <td><img src="../resources/views/pages/Prestamos/logo.png" width="120" height="100"></td>
                <td colspan="3"><strong><center>FORMATO PRESTAMO DE LIBRO</center></strong></td>
                <td><img src="../resources/views/pages/Prestamos/blue.png" width="100" height="55"></td>
            </tr>
            <tr>
                <td colspan="5">_______________________________________________________________________________________</td>
            </tr>
        </table>
    </div>
    <center>UNIVERSIDAD MEXIQUENSE DEL BICENTENARIO</center>
    <center>PLANTEL VILLAVICTORIA</center><br>
    <div class="table-responsive">
        <table border="2" cellpadding="7" cellspacing="0" style="border-radius: 10px;">
                @foreach ($PrestamoIndi as $pres)
                <tr>
                    <td colspan="3" align="center" style="background-color: rgba(105, 105, 105, 0.61)">DATOS DEL LIBRO</td>
                    <td colspan="2">FOLIO</td>
                </tr>
                <tr>
                    <td>TITULO:</td>
                    <td colspan="2">{{$pres->Nombre_libro}}</td>
                    <td># ADQUISICIÓN</td>
                    <td>{{$pres->id}}</td>
                </tr>
                <tr>
                    <td>AUTOR:</td>
                    <td colspan="2">{{$pres->Nombre_autor}}</td>
                    <td rowspan="2">CLASIFICACIÓN</td>
                    <td rowspan="2">{{$pres->Nombre_categoria}}</td>
                </tr>
                <tr>
                    <td>EDITOTIAL:</td>
                    <td colspan="2">{{$pres->Nombre_editorial}}</td>
                </tr>
                <tr>
                    <td colspan="5" align="center" style="background-color: dimgray">DATOS DEL USUARIO</td>
                </tr>
                <tr>
                    <td>NOMBRE:</td>
                    <td colspan="4">{{$pres->name}}</td>
                </tr>
                <tr>
                    <td>DIRECCIÓN:</td>
                    <td colspan="4"></td>
                </tr>
                <tr>
                    <td>DOCUMENTO:</td>
                    <td colspan="2">{{$pres->documento}}</td>
                    <td>NÚMERO:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>CARRERA:</td>
                    <td colspan="2">{{-- {{$pres->Nombre_licenciatura}} --}}</td>
                    <td>MATRICULA:</td>
                    <td>{{$pres->clave}}</td>
                </tr>
                <tr>
                    <td>E-MAIL:</td>
                    <td colspan="4">{{$pres->email}}</td>
                </tr>
                <tr>
                    <td colspan="5" align="center" style="background-color: dimgray">DATOS DEL PRESTAMO</td>
                </tr>
                <tr>
                    <td>FECHA PRESTAMO:</td>
                    <td colspan="2">{{$pres->fecha_inicio}}</td>
                    <td>RESPONSABLE AREA</td>
                    <td>FIRMA RESPONSABLE:</td>
                </tr>
                <tr>
                    <td>FECHA ENTREGA:</td>
                    <td colspan="2">{{$pres->fecha_limite}}</td>
                    <td>{{$pres->id_administrador}}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>OBSERVACIONES:</td>
                    <td colspan="4">{{$pres->observaciones}}</td>
                </tr>
                @endforeach
        </table>
    </div>
</body>
</html>