<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\Maestro;
use App\Models\Prestamo;
use App\Models\Status_usuario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MaestroController extends Controller
{
    //
    public function index(){
        $varMa = User::all()->where('rol','=','Maes');
        return view('pages.Maestros.icons2', compact('varMa'));
    }
    public function create(){
        $status=Status_usuario::all();
        $estados=Estado::orderBy('nombre','asc')->get();
        return view('pages.Maestros.agregarMaestro', compact('status','estados'));
    }
    public function store(Request $request){
        //Para rHacer el registro a la base de datos
        $data= request()->validate([ 'Nombre_maestro'=>'required','clave_empleado'=>'required','Password'=>'required',
        'id_status_usuario'=>'required','email'=>'required|unique:users','carrera_empleado'=>'required',
        'imagen' => 'image|mimes:jpeg,png,svg|max:1024','selectestado'=>'required','selectmunicipio'=>'required',
        'selectlocalidad'=>'required'
            ], [

                'clave_empleado.required'=>'El campo clave es obligatorio',
                'clave_empleado.unique'=>'El campo clave debe ser unico',
                'Nombre_maestro.required'=>'El campo nombre es obligatorio',
                'Password.required'=>'El campo password es obligatorio',
                'id_status_usuario.required'=>'El campo status de usuario es obligatorio',
                'email.required'=>'ingrese el correo electronico',
                'carrera_empleado.required'=>'Ingrese la carrera'
            ]);
            if($imagen = $request->file('imagen')) {
                $rutaGuardarImg = 'imagen/';
                $imagenProducto = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
                $imagen->move($rutaGuardarImg, $imagenProducto);
                $data['imagen_usuario'] = "$imagenProducto";             
            }
            if($request->referencia==""){
                $data['referencia'] = 'sin referencia';
            }else{
                $data['referencia'] = $request->referencia;
            }
            
            if ($request->imagen=="") {
                User::create([
                    'clave'=>$data['clave_empleado'],
                    'email'=>$data['email'],
                    'name'=>$data['Nombre_maestro'],
                    'password'=>Hash::make($data['Password']),
                    'id_status_usuario'=>$data['id_status_usuario'],
                    'id_licenciatura'=>$data['carrera_empleado'],
                    'imagen_usuario' =>'sin imagen',
                    'rol' => 'Maes',
                    'selectestado' =>$data['selectestado'],
                    'selectmunicipio' =>$data['selectmunicipio'],
                    'selectlocalidad' =>$data['selectlocalidad'],
                    'referencia' =>$data['referencia']
                ])->assignRole('Maes');
            }
            else{
                User::create([
                    'clave'=>$data['clave_empleado'],
                    'email'=>$data['email'],
                    'name'=>$data['Nombre_maestro'],
                    'password'=>Hash::make($data['Password']),
                    'id_status_usuario'=>$data['id_status_usuario'],
                    'id_licenciatura'=>$data['carrera_empleado'],
                    'imagen_usuario' =>$data['imagen_usuario'],
                    'rol' => 'Maes',
                    'selectestado' =>$data['selectestado'],
                    'selectmunicipio' =>$data['selectmunicipio'],
                    'selectlocalidad' =>$data['selectlocalidad'],
                    'referencia' =>$data['referencia']
                ])->assignRole('Maes');
            }
        
        return back()->with('success','Registro creado satisfactoriamente');
    }
    public function edit(User $varMa){
        $status=Status_usuario::all();
        $varEdit=User::join('estados as e','users.selectestado','e.id')
        ->join('municipios as m','users.selectmunicipio','m.id')
        ->join('localidades as l','users.selectlocalidad','l.id')
        ->select('users.*','e.nombre as estado','e.id as idestado','m.nombre as municipio','m.id as idmunicipio','l.nombre as localidad','l.id as idlocalidad')
        ->find($varMa->id);
        $estados=Estado::orderBy('nombre','asc')->get();
         return view('pages.Maestros.edit', compact('varMa', 'status','estados','varEdit'));
    }
    public function update(Request $request, User $varMa){
        $varMa->clave = $request->clave_empleado;
        $varMa->name = $request->Nombre_maestro;
        $varMa->password = Hash::make($request->Password);
        $varMa->id_licenciatura = $request->carrera_empleado;
        $varMa->id_status_usuario = $request->id_status_usuario;
        $varMa->selectestado = $request->selectestado;
        $varMa->selectmunicipio = $request->selectmunicipio;
        $varMa->selectlocalidad = $request->selectlocalidad;
        $varMa->referencia = $request->referencia;
        $imagenOld = $varMa->imagen_usuario;
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
            $varMa['imagen_usuario'] = "$imagenProducto";
         }else{
            unset($varMa['imagen_usuario']);
         }
        $varMa->save();
        $varMa = User::all()->where('rol','=','Maes');//paginar la tabla
        return view('pages.Maestros.icons2', compact('varMa'))->with('success','Registro Actualizado satisfactoriamente');//mensaje de actualizacion
    }
    public function destroy(User $varMa){
        
        if(Prestamo::where('id_alumno', '=', $varMa->id)->first() != null){
            return redirect()->back()->with('eliminar','ok');
        }
        else{
        //$cascadaPrestamoDestroy=Prestamo::where('id_alumno','=',$varMa->id)->delete();
        $imagenOld = $varMa->imagen_usuario;
        if ($imagenOld!="") {
            if($imagenOld!="sin imagen"){
              unlink('imagen/'.$imagenOld);  
            }
        }
        $varMa->delete();
        $varMa = User::all()->where('rol','=','Maes');//paginar la tabla
        return view('pages.Maestros.icons2', compact('varMa'))->with('success','Registro Eliminado ');
    }
}
    
}
