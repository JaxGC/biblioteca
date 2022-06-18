<?php

namespace App\Http\Controllers;
use App\Models\Alumno;
use App\Models\Libro;

use App\Models\Prestamo;
use App\Models\Administrador;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Finder\Finder;

class PrestamoController extends Controller
{
    //
    public function index(Request $request){
        
        $varPres = Prestamo::paginate(5);
        
        return view('pages.Prestamos.tables', compact('varPres'));
    
    }
    public function create(){
        $alumnos = User::all()->where('rol','=','Alum');
        $libro=libro::all();
        $libr='';
        $admin=User::all()->where('rol','=','Admin');
        return view('pages.Prestamos.agregarPrestamo', compact('alumnos','libro','admin','libr'));
    }
    public function create2($id){
        $alumnos = User::all()->where('rol','=','Alum');
        $libr=libro::find($id);
        $admin=User::all()->where('rol','=','Admin');
        return view('pages.Prestamos.agregarPrestamo', compact('alumnos','libr','admin'));
    }
    public function store(Request $request, Libro $varlibro ){
        $libr=Libro::all();
        
        $data= request()->validate( ['start_date'=>'required',
        'finish_date'=>'required|date|after:start_date',
        'documento'=>'required',
        'usuario'=>'required']);
    
        Prestamo::create([

            'fecha_inicio'=>$data['start_date'],
            'fecha_limite'=>$data['finish_date'],
            'documento'=>$data['documento'],
            'clave_usuario'=>$data['usuario'],
            'id_libro'=>$data['varlib'],
            'id_administrador'=>auth()->user()->id
        ]);
        return back()->with('success','Registro creado satisfactoriamente');
        $varlibro=$libr->ejemplares-1;
        $varlibro->save();
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
