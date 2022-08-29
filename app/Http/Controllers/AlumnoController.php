<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\Licenciatura;
use App\Models\Status_usuario;
use App\Models\User;
use Illuminate\Http\Request;
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
        $estados=Estado::orderBy('nombre','asc')->get();
        return view('pages.Alumnos.agregarUsuario', compact('status','licen','estados'));
    }
    public function store(Request $request){
        //Para rHacer el registro a la base de datos
        $data= request()->validate([ 'Nombre_completo'=>'required','matricula'=>'numeric|required','email'=>'required|unique:users','Password'=>'required',
        'id_licenciatura'=>'required','id_status_usuario'=>'required',
        'imagen' => 'image|mimes:jpeg,png,svg|max:1024','selectestado'=>'required','selectmunicipio'=>'required',
        'selectlocalidad'=>'required'
            ], [

                'matricula.required'=>'El campo matricula es obligatorio',
                'matricula.numeric'=>'El campo matricula solo debe introducir numeros',
                'Nombre_completo.required'=>'El campo nombre es obligatorio',
                'email.required'=>'El campo usuario es obligatorio',
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
            if($request->referencia==""){
                $data['referencia'] = 'sin referencia';
            }
            if ($request->imagen=="") {
                User::create([
                    'email'=>$data['email'],
                    'password'=>Hash::make($data['Password']),
                    'name'=>$data['Nombre_completo'],
                    'id_status_usuario'=>$data['id_status_usuario'],
                    'rol' => 'Alum',
                    'clave' => $data['matricula'], 
                    'id_licenciatura' => $data['id_licenciatura'],
                    'imagen_usuario' =>'sin imagen',
                    'selectestado' =>$data['selectestado'],
                    'selectmunicipio' =>$data['selectmunicipio'],
                    'selectlocalidad' =>$data['selectlocalidad'],
                    'referencia' =>$data['referencia']
            ])->assignRole('Alum');
            }else{
                User::create([
                'email'=>$data['email'],
                'password'=>Hash::make($data['Password']),
                'name'=>$data['Nombre_completo'],
                'id_status_usuario'=>$data['id_status_usuario'],
                'rol' => 'Alum',
                'clave' => $data['matricula'], 
                'id_licenciatura' => $data['id_licenciatura'],
                'imagen_usuario' =>$data['imagen_usuario'],
                'selectestado' =>$data['selectestado'],
                'selectmunicipio' =>$data['selectmunicipio'],
                'selectlocalidad' =>$data['selectlocalidad'],
                'referencia' =>$data['referencia']
        ])->assignRole('Alum');
            }
            
        return back()->with('success','Registro creado satisfactoriamente');
    }
    public function edit(User $varAlu){
        $status=Status_usuario::all();
        $licen=Licenciatura::all();
        $varEdit=User::join('estados as e','users.selectestado','e.id')
        ->join('municipios as m','users.selectmunicipio','m.id')
        ->join('localidades as l','users.selectlocalidad','l.id')
        ->select('users.*','e.nombre as estado','e.id as idestado','m.nombre as municipio','m.id as idmunicipio','l.nombre as localidad','l.id as idlocalidad')
        ->find($varAlu->id);
        $estados=Estado::orderBy('nombre','asc')->get();
         return view('pages.Alumnos.edit', compact('varAlu', 'status', 'licen','estados','varEdit'));
    }
    public function update(Request $request, User $varAlu){
        $varAlu->clave = $request->matricula;
        $varAlu->name = $request->Nombre_completo;
        $varAlu->email = $request->Direccion;
        $varAlu->password = Hash::make( $request->Password);
        $varAlu->id_status_usuario = $request->id_status_usuario;
        $varAlu->id_licenciatura = $request->id_licenciatura;
        $varAlu->selectestado = $request->selectestado;
        $varAlu->selectmunicipio = $request->selectmunicipio;
        $varAlu->selectlocalidad = $request->selectlocalidad;
        $varAlu->referencia = $request->referencia;

        $imagenOld = $varAlu->imagen_usuario;
        if($imagen = $request->file('imagen')){
            //Para eliminar imagen anterior de la ruta
            if ($imagenOld!="") {
                if($imagenOld!="sin imagen"){
                  unlink('imagen/'.$imagenOld);  
                }
            }
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
        $imagenOld = $varAlu->imagen_usuario;
        if ($imagenOld!="") {
            if($imagenOld!="sin imagen"){
              unlink('imagen/'.$imagenOld);  
            }
        }
        $varAlu->delete();
        $varAlu=User::all()->where('rol','=','Alum');//paginar la tabla
        return view('pages.Alumnos.icons', compact('varAlu'))->with('success','Registro Eliminado ');
    }
}
