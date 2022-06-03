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
            <h1>Listado de la Bitacora</h1>
            <div class="col-xl-4">
                
            </div>
            

        </div>
    </div>
</div>

 @include('layouts.footers.auth')  
    

@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush