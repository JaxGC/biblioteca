            <div class="col-lx-8">
                    <select id="id_maestro" name="id_maestro" class="form-control" hidden>
                            @foreach ($profesores as $prof)
                                <option value="{{$prof->id}}">{{$prof->clave}}: {{$prof->name}}</option>    
                            @endforeach
                    </select>
            </div> 
