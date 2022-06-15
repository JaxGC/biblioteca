@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    <div class="header py-7 py-lg-8 fondoimagen">
        <div class="container " >
            <div class="header-body text-center mt-7 mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-white">{{ __('Bienvenido al sistema de biblioteca UES Villa Victoria') }}</h1>
                    </div>
                </div>
            </div>
            <div class="card-body">
            <div class="table-responsive element3">
                <table id="example" class="table table-bordered table-striped display" style="width:100%">
                    <thead class="thead-dark">
                    <tr>
                        <th>Listado de libros</th>
                        <th>Detalles</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Lib as $li)
                    <tr>
                        <th>{{$li->Nombre_libro}}</th>
                        <th>
                            <button type="button" class="btn btn-outline-default element btn-sm" data-toggle="modal" data-target="#modal-default{{$li->id}}">Ver detalles de libro</button>
                        </th>
                    </tr>
                    @include('modalLibrowelcome')
                    @endforeach
                </tbody>
            </table>
        </div></div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>

    <div class="container mt--10 pb-5"></div>
@endsection
@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
<script>
    
    $(document).ready(function() {
    $('#example').DataTable({
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
