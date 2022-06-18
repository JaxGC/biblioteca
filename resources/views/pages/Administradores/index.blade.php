    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <!-- ✅ Load CSS file for Select2 -->
        <link
        href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"
        rel="stylesheet"
        />

        <!-- ✅ load jQuery ✅ -->
        <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"
        ></script>


        <!-- ✅ load JS for Select2 ✅ -->
        <script
        src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    ></script>

    
    
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
        <title>Document</title>
    
    
    </head>
    <body>
      
        <div class="row">
            <div class="col-md-3">
        <h3><strong>
            Estados:
            </strong>
            <br>
        </h3>
            <select name="estado" id="selectestado" class="form-select" aria-label="Default select example">
                <option value="">
                    Selecionar Estados
                </option>
                @foreach ($estados as $estado)
                    <option value="{{$estado->id}}">{{$estado->nombre}}</option>
                @endforeach
                
            </select>
        </div>
        <div class="col-md-3">
        <strong>
            <h3>
            Municipios
            </strong>
        </h3>
        <select name="municipio" id="selectmunicipio" class="form-select" aria-label="Default select example">
            <option value="">
                Selecionar Municipio
            </option>
                
    </select>
        
        </div>
        <div class="col-md-6">
            <h3>
    <strong>
       Localidades
        </strong>
    </h3>
    <select name="localidad" id="selectlocalidad" class="form-select"aria-label="Default select example">
        <option value="">
            Selecionar Localidad
        </option>
            
    </select>
    </div>
    </div>
    <script src="{{ asset('js/crear.js') }}"></script>
    </body>
    </html>