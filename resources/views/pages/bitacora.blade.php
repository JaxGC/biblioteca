@extends('layouts.app')

@section('content')
<div class="card-body shadow" style="background-color: #80ba26">
    <br>
    <br>
    <br>
</div>
<div class="card-body">
    <div>
        <div class="card shadow">
            <div class="card-body">
            <h1>Bitacora de prestamos</h1></div>
            <div class="card-body">
                <strong>Reporte de listado por rango de fechas</strong>
                <div class="card-body">
                <form action="{{route('PDFPrestamoFechas')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="row">                            
                                <div class="col-sm-3">
                                    <input class="form-control" type="date" value="{{old('fecha_ini')}}" name="fecha_ini" id="fecha_ini">      
                                </div>
                                <div class="col-sm-3">
                                    <input class="form-control" type="date" value="{{old('fecha_fin')}}" name="fecha_fin" id="fecha_fin"> 
                                </div>  
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-primary">Imprimir</button>
                                </div>                      
                            </div>
                        </div>
                    </div>
                </form>
                </div>
                <br>
                <div class="table-responsive">
                    <table id="example" class="table table-bordered table-striped display" style="width:100%">
                        <thead class="thead-dark">
                            <tr>
                                @if (auth()->user()->rol=="Admin")
                                    <th>Alumno</th>
                                @endif
                                
                            <th>Fecha inicio</th>
                            <th>Fecha limite</th>
                            <th >Documento</th>
                            <th>Nombre del libro</th>
                            <th>Estado del Prestamo</th>
                            @if (auth()->user()->rol=="Alum")
                            <th hidden></th>
                            @endif
                            <th>Reporte</th> 
                            </tr>
                        </thead>    
                        <tbody> 
                            @foreach ($varPres as $pres)
                            <tr>
                                @if (auth()->user()->rol=="Admin")
                                    <th>{{$pres->Alumno}}</th>
                                @endif   
                            <td>{{$pres->fecha_inicio}}</td>
                            <td>{{$pres->fecha_limite}}</td>
                            <td>{{ $pres->documento}}</td>
                            <td>{{$pres->Nombre_libro}}</td>
                            <td>
                                @if($pres->devolucion==2 && $pres->estado_prestamo==2)
                                    <label class ="btn-success">Finalizo el prestamo</label>
                                    @elseif($pres->devolucion==1 && $pres->estado_prestamo==1)
                                        <label class ="btn-warning">Prestamo Activo</label>
                                @endif
                                @if ($pres->devolucion==0 && $pres->estado_prestamo==0)
                                    <label class ="btn-info">En espera de confirmacion</label>
                                @endif
                            </td>
                            <td>
                                <a class="" href="{{ route('PDFPrestamoindividual',$pres->id) }}">
                                    <i class="btn btn-outline-success btn-sm btn-block">Generar reporte</i>
                                </a>
                            </td>
                            @if (auth()->user()->rol=="Alum")
                            <th hidden></th>
                            @endif
                            </tr>
                             @endforeach
                        </tbody> 
                        <tfoot>
                            <tr>
                                @if (auth()->user()->rol=="Admin")
                                <th>Alumno</th>
                                @endif
                                <th>Fecha inicio</th>
                                <th>Fecha limite</th>
                                <th >Documento</th>
                                <th>Nombre del libro</th>
                                <th>Estado del Prestamo</th>
                                @if (auth()->user()->rol=="Alum")
                            <th hidden></th>
                            @endif
                            <th>Reporte</th>
                            </tr>
                        </tfoot> 
                    </table>
                </div>
            </div>
            

        </div>
    </div> @include('layouts.footers.auth')  
</div>


    

@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
<script>
    
    $(document).ready(function() {
    $('#example').DataTable({
        order: [[5, 'desc']],
        responsive: true,
        lengthMenu: [
                [5, 10, 20, -1],
                [5, 10, 20, 'Todos'],
            ],
    "language": {
    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
    
    });
    });
    
    
        </script>
@endpush