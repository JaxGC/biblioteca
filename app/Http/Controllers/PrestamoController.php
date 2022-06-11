<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Libro;

use App\Models\Prestamo;
use App\Models\Administrador;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PrestamoController extends Controller
{
    //
    public function index(Request $request){

        $texto=trim($request->get('texto'));
        $usuerios=DB::table('users')->
        select('name')
        ->where('name','LIKE','%'.$texto.'%');
        
        $varPres = Prestamo::paginate(5);
        return view('pages.Prestamos.tables', compact('varPres','texto','usuerios'));

    }
    public function buscar(Request $request){
        $texto=trim($request->get('texto'));
        $usuerios=DB::table('users')->
        select('name')
        ->where('name','LIKE','%'.$texto.'%');
        dd($texto);
        return view('pages.Prestamos.tables', compact('usuerios','texto'));
    }
    public function create(){
        $us=user::all();
        $libr=libro::all();
        $admin=administrador::all();
        return view('pages.Prestamos.agregarPrestamo', compact('us','libr','admin'));
    }
    public function store(Request $request){
        //Para rHacer el registro a la base de datos
      //dd($request);
        $data= request()->validate( ['start_date'=>'required','finish_date'=>'required|date|after:start_date']);
        Prestamo::create([

            'fecha_inicio'=>$data['start_date'],
            'fecha_limite'=>$data['finish_date'],
            'documento'=>$data['documento'],
            'clave_usuario'=>$data['clave_usuario'],
            'id_libro'=>$data['id_libro'],
            'id_administrador'=>$data['id_administrador']
        ]);
        return back()->with('success','Registro creado satisfactoriamente');
    }
    public function edit(Prestamo $varPres){
        $us=user::all();
        $libr=libro::all();
        $admin=administrador::all();;
         return view('pages.Prestamos.editarPrestamo', compact('varPres', 'us','libr','admin'));
    }
    public function update(Request $request, Prestamo $varPres){
        $varPres->fecha_inicio = $request->fecha_inicio;
        $varPres->fecha_limite = $request->fecha_limite;
        $imagenOld = $varPres->documento;
        if($imagen = $request->file('imagen')){
            //Para eliminar imagen anterior de la ruta
            Storage::delete('imagen/'.$imagenOld);
            //

            $rutaGuardarImg = 'imagen/';
            $imagenProducto = date('YmdHis') . "." . $imagen->getClientOriginalExtension(); 
            $imagen->move($rutaGuardarImg, $imagenProducto);
            $varpres['documento'] = "$imagenProducto";
         }else{
            unset($varPres['documento']);
         }
        $varPres->clave_usuario = $request->clave_usuario;
        $varPres-> id_libro= $request->id_libro;
        $varPres->id_administrador = $request->id_administrador;
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
