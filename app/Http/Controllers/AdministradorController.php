<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\Estado;
use App\Models\Status_usuario;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use PDF;

class AdministradorController extends Controller
{
    //

    public function index(){
        $varAdmin=User::all()->where('rol','=','Admin');
            return view('pages.Administradores.icons3', compact('varAdmin'));
    }
     public function pdf(){
        $varAdmin=User::all()->where('rol','=','Admin');
        //$pdf = PDF::loadView('pages.Administradores.pdfAdmin',['varAdmin'=>$varAdmin]);
        //return $pdf->stream();//Para ver el pdf en el navegador
        //return $pdf->download('___Lista de administradores.pdf');//Para descargar el pdf
        $pdf = FacadePdf::loadView('pages.Administradores.pdfAdmin', compact('varAdmin'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream();
            //return view('pages.Administradores.pdfAdmin', compact('varAdmin'));
    } 
    public function create(){
        $status=Status_usuario::all();
        $estados=Estado::orderBy('nombre','asc')->get();
        return view('pages.Administradores.agregarAdministrador', compact('status','estados'));
    }
    public function store(Request $request){
        //Para rHacer el registro a la base de datos
       
        $data= request()->validate([ 'Usuario'=>'required','password'=>'required',
        'Nombre_administrador'=>'required','id_status_usuario'=>'required',
        'imagen' => 'image|mimes:jpeg,png,svg|max:1024','selectestado'=>'required','selectmunicipio'=>'required',
        'selectlocalidad'=>'required'
            ], [

                'Usuario.required'=>'El campo usuario es obligatorio',
                'password.required'=>'El campo password es obligatorio',
                'Nombre_administrador.required'=>'El campo nombre es obligatorio',
                'id_status_usuario.required'=>'El campo status de usuario es obligatorio'
            ]);

            if($imagen = $request->file('imagen')) {
                $rutaGuardarImg = 'imagen/';
                $imagenProducto = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
                $imagen->move($rutaGuardarImg, $imagenProducto);
                $data['imagen_usuario'] = "$imagenProducto";             
            }
            //dd($data);
            if($request->referencia==""){
                $data['referencia'] = 'sin referencia';
            }
            if ($request->imagen=="") {
                User::create([
                    'email'=>$data['Usuario'],
                    'password'=>Hash::make($data['password']),
                    'name'=>$data['Nombre_administrador'],
                    'id_status_usuario'=>$data['id_status_usuario'],
                    'rol' => 'Admin',
                    'clave' => '',
                    'id_licenciatura' => '0',
                    'imagen_usuario' =>'sin imagen',
                    'selectestado' =>$data['selectestado'],
                    'selectmunicipio' =>$data['selectmunicipio'],
                    'selectlocalidad' =>$data['selectlocalidad'],
                    'referencia' =>$data['referencia']
                ])->assignRole('Admin');
            }else{
                User::create([
            'email'=>$data['Usuario'],
            'password'=>Hash::make($data['password']),
            'name'=>$data['Nombre_administrador'],
            'id_status_usuario'=>$data['id_status_usuario'],
            'rol' => 'Admin',
            'clave' => '',
            'id_licenciatura' => '0',
            'imagen_usuario' =>$data['imagen_usuario'],
            'selectestado' =>$data['selectestado'],
            'selectmunicipio' =>$data['selectmunicipio'],
            'selectlocalidad' =>$data['selectlocalidad'],
            'referencia' =>$data['referencia']
        ])->assignRole('Admin');
            }
        
        return back()->with('success','Registro creado satisfactoriamente');
    }

   /*  public function encriptardatos1(Request $request){
       return view('pages.Administradores.encriptar');
    }
public function encriptardatos(Request $request){
    $datos=request();
    $datos1 = Hash::make($datos['password']);
    //echo $datos1; 
    dd($datos1);
} */


    public function edit(User $varAdmin){
        //dd($id);
        $status=Status_usuario::all();
        $varEdit=User::join('estados as e','users.selectestado','e.id')
        ->join('municipios as m','users.selectmunicipio','m.id')
        ->join('localidades as l','users.selectlocalidad','l.id')
        ->select('users.*','e.nombre as estado','e.id as idestado','m.nombre as municipio','m.id as idmunicipio','l.nombre as localidad','l.id as idlocalidad')
        ->find($varAdmin->id);
        $estados=Estado::orderBy('nombre','asc')->get();
         return view('pages.Administradores.edit', compact('varAdmin','status','estados','varEdit'));
    }
    public function update(Request $request, User $varAdmin){
        //return $request->all();
        $varAdmin->name = $request->name;
        $varAdmin->email = $request->email;
        $varAdmin->password = Hash::make( $request->password);
        $varAdmin->id_status_usuario = $request->id_status_usuario;
        $varAdmin->selectestado = $request->selectestado;
        $varAdmin->selectmunicipio = $request->selectmunicipio;
        $varAdmin->selectlocalidad = $request->selectlocalidad;
        $varAdmin->referencia = $request->referencia;
        $imagenOld = $varAdmin->imagen_usuario;
        //dd($imagenOld);
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
            $varAdmin['imagen_usuario'] = "$imagenProducto";
         }else{
            unset($varAdmin['imagen_usuario']);
         }
        $varAdmin->save();
        $varAdmin=User::all()->where('rol','=','Admin');//paginar la tabla
        return view('pages.Administradores.icons3', compact('varAdmin'))->with('success','Registro Actualizado satisfactoriamente');//mensaje de actualizacion
    }
    public function destroy( User $varAdmin){
        
        $imagenOld = $varAdmin->imagen_usuario;
        if ($imagenOld!="") {
            if($imagenOld!="sin imagen"){
              unlink('imagen/'.$imagenOld);  
            }
        }
        $varAdmin->delete();
        $varAdmin=User::all()->where('rol','=','Admin');//paginar la tabla
        return view('pages.Administradores.icons3', compact('varAdmin'))->with('success','Registro Eliminado ');
    }
}
