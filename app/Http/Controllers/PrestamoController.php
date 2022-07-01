<?php

namespace App\Http\Controllers;
use App\Models\Alumno;
use App\Models\Libro;

use App\Models\Prestamo;
use App\Models\Administrador;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use function PHPSTORM_META\map;

class PrestamoController extends Controller
{
    //
    public function index(Request $request){
        
        $varPres = Prestamo::join('libros','prestamos.id_libro','=','libros.id')
        ->join('users','prestamos.id_alumno','=','users.id')
        ->where('prestamos.devolucion','!=','2')
        ->select('prestamos.*','libros.Nombre_libro','users.name as Alumno')
        ->orderby('prestamos.estado_prestamo','asc')
        ->get();
        if ($varPres=="") {
            return back()->withErrors('danger','No hay prestamos activos ni en espera');
        } 
        else 
        {
           return view('pages.Prestamos.tables', compact('varPres')); 
        }
        
        
    
    }
    public function create($id){
        if($id>0)
        {
            Carbon::setTestNow();
            if (Carbon::now()->isWeekend()) {
                echo("Es fin de semana");
            }
            else 
            {
                $alumnos = User::all()->where('rol','=','Alum');
                $libr=libro::find($id);
                if ($libr->ejemplares<=0){
                    return redirect()->route('map')->with('nohay','ok');    
                }
                else{
                    $admin=User::all()->where('rol','=','Admin');
                    return view('pages.Prestamos.agregarPrestamo', compact('alumnos','libr','admin'));
                }
            } 
        }
        else
        {
            Carbon::setTestNow();
            if (Carbon::now()->isWeekend()) {
                echo("Es fin de semana");
            } else {
                /* 
                return redirect()->route('map')->with('nohay','ok'); */
            $alumnos = User::all()->where('rol','=','Alum');
            $libro=libro::all()->where('ejemplares','>',0);
            
            $admin=User::all()->where('rol','=','Admin');
            return view('pages.Prestamos.agregarPrestamo2', compact('alumnos','libro','admin',));
            }
        }
        
    }
    public function create2($id){

        $ejemplares=Prestamo::where('id',$id)->update(['devolucion'=>'1','estado_prestamo'=>1]);
        $alumnos = User::all()->where('rol','=','Alum');
        $libr=libro::find($id);
     
        $admin=User::all()->where('rol','=','Admin');
        return back()->with('success','Registro creado satisfactoriamente');
    }

    Public function devolucion(Request $request, $id){//para poner el libro devuelto
        
        $data= request('observaciones');

        $libID = Libro::join('prestamos','libros.id','=','prestamos.id_libro')
        ->where('prestamos.id','=', $id)
        //->where('Nombre_libro', '=', $Nombre_libro)
        ->select('libros.*')
        ->get();
        
        foreach ($libID as $elemento) {
           $var= $elemento->ejemplares+1;
        
        $ejemplares=Libro::where('id',$elemento['id'])->update(['ejemplares'=>$var]);
        
    }
        $dev=Prestamo::where('id',$id)->update(['devolucion'=>'2','estado_prestamo'=>'2','observaciones'=>$data]);
        return back()->with('success','El libro  a sido devuelto.');
    }

    public function store(Request $request, Libro $varlibro ){
     
        $rol=User::find(auth()->user()->id);
        
        if($rol->rol=='Admin')
        {
        $data= request()->validate( ['start_date'=>'required',
        'finish_date'=>'required|date|after:start_date',
        'documento'=>'required',
        'id_libro'=>'required',
      'estadolibro'=>'required',
      'id_alumno'=>'required',
      'observaciones'=>''
    
       ]);
    
        Prestamo::create([

            'fecha_inicio'=>$data['start_date'],
            'fecha_limite'=>$data['finish_date'],
            'documento'=>$data['documento'],
            'id_libro'=>$data['id_libro'],
            'estadolibro'=>$data['estadolibro'],
            'id_alumno'=>$data['id_alumno'],
            'estado_prestamo'=>1,
            'devolucion'=>1,
            'observaciones'=>$data['observaciones'],
            'id_administrador'=>auth()->user()->id
        ]);
        $ejemplar=Libro::find($data['id_libro']);
        
        $var=$ejemplar->ejemplares-1;
        $ejemplares=Libro::where('id',$data['id_libro'])->update(['ejemplares'=>$var]);
       
        return back()->with('success','Registro creado satisfactoriamente');
    }
    else
    {
        $data= request()->validate( ['start_date'=>'required',
        'finish_date'=>'required|date|after:start_date',
        'documento'=>'required',
        'id_libro'=>'required',
      'estadolibro'=>'required',
      'id_alumno'=>'required',
      'observaciones'=>''
    
       ]);
    
        Prestamo::create([

            'fecha_inicio'=>$data['start_date'],
            'fecha_limite'=>$data['finish_date'],
            'documento'=>$data['documento'],
            'id_libro'=>$data['id_libro'],
            'estadolibro'=>$data['estadolibro'],
            'id_alumno'=>$data['id_alumno'],
            'estado_prestamo'=>0,
            'devolucion'=>0,
            'observaciones'=>$data['observaciones'],
            'id_administrador'=>'1'
        ]);
        $ejemplar=Libro::find($data['id_libro']);
        
        $var=$ejemplar->ejemplares-1;
        $ejemplares=Libro::where('id',$data['id_libro'])->update(['ejemplares'=>$var]);
       
        $varlib = Libro::all();//paginar la tabla
        return view('pages.Libros.maps', compact('varlib'))
        ->with('success','Registro creado satisfactoriamente');
        

    }
   
       
    }
    public function edit(Prestamo $varPres){
        $alumnos=Alumno::all();
        $libr=libro::all();
        $admin=administrador::all();;
         return view('pages.Prestamos.editarPrestamo', compact('varPres', 'us','libr','admin'));
    }
    public function update(Request $request, Prestamo $varPres){
        $varPres->fecha_inicio = $request->fecha_inicio;
        $varPres->fecha_limite = $request->fecha_limite;
      
        $varPres->save();
        $varPres = Prestamo::paginate(5);//paginar la tabla
        return view('pages.Prestamos.table', compact('varPres'))->with('success','Registro Actualizado satisfactoriamente');//mensaje de actualizacion
    }
    public function destroy(Prestamo $varPres){
        $varPres->delete();
        $varPres = Prestamo::paginate(5);//paginar la tabla
        return view('pages.Prestamos.table', compact('varPres'))->with('success','Registro Eliminado ');
    }
}
