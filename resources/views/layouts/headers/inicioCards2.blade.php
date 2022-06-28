
            <!-- Card stats -->
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
                                    <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-nowrap"><a href="{{ route('bitacora') }}" class="font-weight-bold ml-1 btn btn-sm badge-pill badge-info" {{-- target="_blank" --}}>Ver registros</a></span>
                                <h2><span class="text-success mr-2"><i class="fa fa-arrow-up">{{$contadorPresActivos1}}</i></span></h2>
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
                                    <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                        <i class="fas fa-chart-pie"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <a href="{{ route('bitacora') }}" class="font-weight-bold ml-1 btn btn-sm badge-pill badge-info" >Ver registros</a>
                                <h2><span class="text-success mr-2"><i class="fa fa-arrow-up"></i>{{$contadorPresPausados0}}</span></h2>
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
                                    <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-nowrap"><a href="{{ route('bitacora') }}" class="font-weight-bold ml-1 btn btn-sm badge-pill badge-info">Ver registros</a></span>
                                <h2><span class="text-success mr-2"><i class="fa fa-arrow-up"></i>{{$contadorPresFinalizados2}}</span></h2>
                            </p>
                        </div>
                    </div>
                </div>
                
            </div>