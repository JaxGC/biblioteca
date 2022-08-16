@extends('layouts.app')

@section('content')
@if (session('siaccess')=='ok')
<script>
    Swal.fire({
    icon: 'success',
    title: 'Excelente!',
    text: '¡Cambio de rol correcto!',
    showConfirmButton: false,
    footer: '<a href="{{ route("home") }}" class="btn btn-info btn-block" >Atrás</a>'
    })
</script>
@endif
    @include('layouts.headers.cards')
    
    <div class="container-fluid mt--7">
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush