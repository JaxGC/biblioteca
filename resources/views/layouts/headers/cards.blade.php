<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            @if (auth()->user()->rol!='Admin')
                @can('PrestamoLibro') 
                    @include('layouts.headers.inicioCards2')    
                @endcan
            @else
            <div class="row">
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Prestamos actualmente activos</h5>
                                    <span class="h3 font-weight-bold mb-0"></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                        <i class="ni ni-button-play"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-nowrap"><a href="{{ route('table2',1) }}" class="font-weight-bold ml-1 btn btn-sm badge-pill badge-info" {{-- target="_blank" --}}>Ver registros</a></span>
                                <h2><span class="text-success mr-2"><i class="fa fa-arrow-up">{{$contadorPresActivos}}</i></span></h2>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Prestamos por autorizar</h5>
                                    <span class="h3 font-weight-bold mb-0"></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                        <i class="ni ni-button-pause"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <a href="{{ route('table2',0) }}" class="font-weight-bold ml-1 btn btn-sm badge-pill badge-info" >Ver registros</a>
                                <h2><span class="text-success mr-2"><i class="fa fa-arrow-up"></i>{{$contadorPresPausados}}</span></h2>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Prestamos finalizados</h5>
                                    <span class="h3 font-weight-bold mb-0"></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                        <i class="ni ni-button-power"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-nowrap"><a href="{{ route('bitacora') }}" class="font-weight-bold ml-1 btn btn-sm badge-pill badge-info">Ver registros</a></span>
                                <h2><span class="text-success mr-2"><i class="fa fa-arrow-up"></i>{{$contadorPresFinalizados}}</span></h2>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Libros</h5>
                                    <span class="h3 font-weight-bold mb-0"></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                        <i class="ni ni-books"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-nowrap">Regitrados</span>
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i>{{$contadorlibros}}</span>
                            </p>
                        </div>
                    </div>
                </div> 
            </div>
            @endif
        </div>
    </div>
</div>