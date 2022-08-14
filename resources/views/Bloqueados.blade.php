<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bloqueado!</title>
</head>
<body>
    <strong>Usted ah sido bloqueado, no puede acceder al sistema.</strong>
    <p>Desea ingresar como invitado?</p>
    
    @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;" enctype="multipart/form-data">
                @csrf
                
            </form>
    @endauth
    <button class="btn btn-danger">
        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Salir') }}</span>
        </a>
    </button>
</body>
</html>