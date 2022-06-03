<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Licenciatura;
use App\Models\Status_usuario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AlumnoController extends Controller
{
    //
    public function index(){
        //para traer los usuarios alumnos
        $varAlu=User::all()->where('rol','=','Alum');
        return view('pages.Alumnos.icons', compact('varAlu'));
    }
    public function create(){
        $status=Status_usuario::all();
        $licen=Licenciatura::all();
        return view('pages.Alumnos.agregarUsuario', compact('status','licen'));
    }
    public function store(Request $request){
        //Para rHacer el registro a la base de datos
        $data= request()->validate([ 'Nombre_completo'=>'required','matricula'=>'required','Direccion'=>'required','Password'=>'required',
        'id_licenciatura'=>'required','id_status_usuario'=>'required',
        'imagen' => 'required|image|mimes:jpeg,png,svg|max:1024'
            ], [

                'matricula.required'=>'El campo matricula es obligatorio',
                'Nombre_completo.required'=>'El campo nombre es obligatorio',
                'Direccion.required'=>'El campo usuario es obligatorio',
                'Password.required'=>'El campo password es obligatorio',
                'id_licenciatura.required'=>'El campo licenciatura es obligatorio',
                'id_status_usuario.required'=>'El campo status de usuario es obligatorio'
            ]);

            if($imagen = $request->file('imagen')) {
                $rutaGuardarImg = 'imagen/';
                $imagenProducto = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
                $imagen->move($rutaGuardarImg, $imagenProducto);
                $data['imagen_usuario'] = "$imagenProducto";             
            }

            User::create([
                'email'=>$data['Direccion'],
                'password'=>Hash::make($data['Password']),
                'name'=>$data['Nombre_completo'],
                'id_status_usuario'=>$data['id_status_usuario'],
                'rol' => 'Alum',
                'clave' => $data['matricula'], 
                'id_licenciatura' => $data['id_licenciatura'],
                'imagen_usuario' =>$data['imagen_usuario'],
        ])->assignRole('Alum');
        return back()->with('success','Registro creado satisfactoriamente');
    }
    public function edit(User $varAlu){
        $status=Status_usuario::all();
        $licen=Licenciatura::all();
         return view('pages.Alumnos.edit', compact('varAlu', 'status', 'licen'));
    }
    public function update(Request $request, User $varAlu){
        $varAlu->clave = $request->matricula;
        $varAlu->name = $request->Nombre_completo;
        $varAlu->email = $request->Direccion;
        $varAlu->password = Hash::make( $request->Password);
        $varAlu->id_status_usuario = $request->id_status_usuario;
        $varAlu->id_licenciatura = $request->id_licenciatura;

        $imagenOld = $varAlu->imagen_usuario;
        if($imagen = $request->file('imagen')){
            //Para eliminar imagen anterior de la ruta
            Storage::delete('imagen/'.$imagenOld);
            //FacadesFile::delete($varAdmin->imagen_usuario);

            $rutaGuardarImg = 'imagen/';
            $imagenProducto = date('YmdHis') . "." . $imagen->getClientOriginalExtension(); 
            $imagen->move($rutaGuardarImg, $imagenProducto);
            $varAlu['imagen_usuario'] = "$imagenProducto";
         }else{
            unset($varAlu['imagen_usuario']);
         }

        $varAlu->save();
        $varAlu=User::all()->where('rol','=','Alum');//paginar la tabla
        return view('pages.Alumnos.icons', compact('varAlu'))->with('success','Registro Actualizado satisfactoriamente');//mensaje de actualizacion
    }
    public function destroy(User $varAlu){
        $varAlu->delete();
        $varAlu=User::all()->where('rol','=','Alum');//paginar la tabla
        return view('pages.Alumnos.icons', compact('varAlu'))->with('success','Registro Eliminado ');
    }
}
