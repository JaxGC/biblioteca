<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ asset('argon') }}/img/brand/blue.png" class="navbar-brand-img" alt="...">
        </a>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="ni ni-tv-2 text-primary"></i> {{ __('Página Principal') }}
                    </a>
                </li>
                <li class="nav-item">
                    {{-- @can('PrestamoLibro') --}}
                    <a class="nav-link" href="{{ route('bitacora') }}">
                      <i class="ni ni-collection text-default"></i>
                      <span class="nav-link-text">Bitacora</span>
                    </a>
                    {{-- @endcan --}}
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="ni ni-badge" ></i>
                        <span class="nav-link-text" >{{ __('Datos Personales') }}</span>
                    </a>

                    <div class="collapse show" id="navbar-examples">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('profile.edit') }}">
                                    {{ __('Editar usuario') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    @can('icons3')
                    <a class="nav-link " href="#navbarusu" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                        <i class="ni ni-single-02" ></i>
                        <span class="nav-link-text" >{{ __('Usuarios') }}</span>
                    </a>
    
                    <div class="collapse show" id="navbarusu">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                
                                    <a class="nav-link" href="{{ route('icons3') }}">
                                        {{ __('Administradores') }}
                                    </a>
                                
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('icons') }}">
                                    {{ __('Alumnos') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('icons2') }}">
                                    {{ __('Maestros') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('rolesUsu') }}">
                                    {{ __('Cambiar rol de usarios') }}
                                </a>
                            </li>
                        </ul>
                    </div>@endcan
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('map') }}">
                        <i class="ni ni-books"></i> {{ __('Libros') }}
                    </a> 
                </li>
                @can('icons3')
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('editoriales') }}">
                        <i class="ni ni-building text-default"></i>
                        <span class="nav-link-text">Editoriales</span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('autores') }}">
                        <i class="ni ni-paper-diploma text-default"></i>
                        <span class="nav-link-text">Autores</span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('categoria') }}">
                        <i class="ni ni-archive-2 text-default"></i>
                        <span class="nav-link-text">Categorias</span>
                      </a>
                  </li>
                 
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('table') }}">
                      <i class="ni ni-folder-17 text-default"></i>
                      <span class="nav-link-text">Prestamos</span>
                    </a>
                </li>@endcan
                <li class="nav-item">
                    @can('icons3')
                    <a class="nav-link" href="{{ route('licenciaturas') }}">
                        <i class="ni ni-hat-3 text-default"></i>
                        <span class="nav-link-text">Licenciaturas</span>
                      </a>
                    @endcan
                </li>
                
        </div>
    </div>
</nav>
