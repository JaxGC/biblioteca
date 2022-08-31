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
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

use function PHPSTORM_META\map;

class PrestamoController extends Controller
{
    public function tipo_estado($estado_prestamo){
         if($estado_prestamo==1)
        {
            $varPres = Prestamo::join('libros','prestamos.id_libro','=','libros.id')
            ->join('users','prestamos.id_alumno','=','users.id')
            ->where('prestamos.estado_prestamo','=','1')
            ->select('prestamos.*','libros.Nombre_libro','users.name as Alumno')
            ->orderby('prestamos.estado_prestamo','asc')
            ->get();
            if ($varPres=="") {
                return back()->withErrors('danger','No hay prestamos activos ');
            } 
            else 
            {
               return view('pages.Prestamos.tables', compact('varPres')); 
            }
            
        }
        else
        {
            if($estado_prestamo==0)
            {
                $varPres = Prestamo::join('libros','prestamos.id_libro','=','libros.id')
                ->join('users','prestamos.id_alumno','=','users.id')
                ->where('prestamos.estado_prestamo','=','0')
                ->select('prestamos.*','libros.Nombre_libro','users.name as Alumno')
                ->orderby('prestamos.estado_prestamo','asc')
                ->get();
                if ($varPres=="") {
                    return back()->withErrors('danger','No hay prestamos activos ');
                } 
                else 
                {
                   return view('pages.Prestamos.tables', compact('varPres')); 
                }
                
            }
        }
    
    }
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
                echo("Es fin de semana no se pueden realizar préstamos");
            }
            else 
            {
                /* $alumnos = User::all()->where('rol','=','Alum'); */
                $alumnos = User::where(function($query){
                    $query->where('rol','=','Alum')
                    ->orWhere('rol','=','Maes');
                })->get();
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
                echo("Es fin de semana no se pueden realizar préstamos");
            } else {
                /* 
                return redirect()->route('map')->with('nohay','ok'); */
            $alumnos = User::where(function($query){
                $query->where('rol','=','Alum')
                ->orWhere('rol','=','Maes');
            })->get();
            //dd($alumnos);
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
           $varia= $elemento->libros_prestados-1;
        $ejemplares=Libro::where('id',$elemento['id'])->update(['ejemplares'=>$var]);
        $libros_prestadoss=Libro::where('id',$elemento['id'])->update(['libros_prestados'=>$varia]);
        
    }
        $dev=Prestamo::where('id',$id)->update(['devolucion'=>'2','estado_prestamo'=>'2','observaciones'=>$data]);
        return back()->with('success','El libro  a sido devuelto.');
    }
    public function pdf($id){
        $PrestamoIndi=Prestamo::join('libros','prestamos.id_libro','=','libros.id')
        ->join('users','prestamos.id_alumno','=','users.id')
        ->join('estados as e','users.selectestado','e.id')
        ->join('municipios as m','users.selectmunicipio','m.id')
        ->join('localidades as l','users.selectlocalidad','l.id')/* 
        ->join('autores','libros.id_autor','=','autores.id')
        ->join('editoriales','libros.id_editorial','=','editoriales.id')
        ->join('categorias','libros.id_categoria','=','categorias.id') */
        ->where('prestamos.id','=', $id)
        //->where('prestamos.devolucion','!=','2')
        ->select('prestamos.*','prestamos.observaciones as obser','libros.*','users.*',
        /* 'autores.Nombre_autor','editoriales.Nombre_editorial',
        'categorias.Nombre_categoria', */
        'e.nombre as estado','e.id as idestado',
        'm.nombre as municipio','m.id as idmunicipio',
        'l.nombre as localidad','l.id as idlocalidad')
        ->get();
        $pdf = FacadePdf::loadView('pages.Prestamos.pdfIndi', compact('PrestamoIndi'))->setOptions(['defaultFont' => 'Calibri']);
        return $pdf->stream();
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
        $prestados=Libro::find($data['id_libro']);
        
        $var=$ejemplar->ejemplares-1;
        $va=$prestados->libros_prestados+1;
        $ejemplares=Libro::where('id',$data['id_libro'])->update(['ejemplares'=>$var]);
        $libros_prestados=Libro::where('id',$data['id_libro'])->update(['libros_prestados'=>$va]);
       
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
        $prestados=Libro::find($data['id_libro']);

        $var=$ejemplar->ejemplares-1;
        $va=$prestados->libros_prestados+1;
        $ejemplares=Libro::where('id',$data['id_libro'])->update(['ejemplares'=>$var]);
        $libros_prestados=Libro::where('id',$data['id_libro'])->update(['libros_prestados'=>$va]);
       
        $varlib = Libro::all();//paginar la tabla
        return view('pages.Libros.maps', compact('varlib'))
        ->with('success','Registro creado satisfactoriamente');
        

    }
   
       
    }
    public function edit(Prestamo $varpres){
         $alumnos=User::join('prestamos','users.id','=','prestamos.id_alumno')
         ->where('prestamos.id','=', $varpres->id)
         ->select('users.name')
         ->get();
        
        $libr = Libro::join('prestamos','libros.id','=','prestamos.id_libro')
        ->where('prestamos.id','=', $varpres->id)
        ->select('libros.*')
        ->get();
       // return $alumnos;
         return view('pages.Prestamos.editarPrestamo', compact('varpres','alumnos','libr'));
    }
    public function update(Request $request, Prestamo $varpres){
        //$varpres->fecha_inicio = $request->fecha_inicio;
        /* $data= request()->validate( ['fecha_inicio'=>'required',
        'fecha_limite'=>'required|date|after:fecha_inicio'
       ]); */
        $varpres->fecha_limite = $request->fecha_limite;
        //$varpres->fecha_limite = $data['fecha_limite'];
        $varpres->save();
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
        return view('pages.Prestamos.tables', compact('varPres'))->with('success','Registro Actualizado satisfactoriamente');//mensaje de actualizacion
    }
    public function destroy(Prestamo $varPres){
        $varPres->delete();
        $varPres = Prestamo::all();//paginar la tabla
        return view('pages.Prestamos.tables', compact('varPres'))->with('success','Registro Eliminado ');
    }
}
