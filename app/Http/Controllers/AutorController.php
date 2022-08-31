<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;
use Laravel\Ui\AuthRouteMethods;

class AutorController extends Controller
{
    //
    public function index(){
        //listado
        $varaut = Autor::all();
        return view('pages.Autores.autores', compact('varaut'));
    }
    public function create(){
        //Boton de registro
        return view('pages.Autores.agregarAutor');
    }
    public function store(Request $request){
        //Para rHacer el registro a la base de datos
        $data= request()->validate([ 'Nombre_autor'=>'required'
            ], [

                'Nombre_autor.required'=>'El campo nombre es obligatorio'
            ]);
        Autor::create([
            'Nombre_autor'=>$data['Nombre_autor']
        ]); 
        return back()->with('success','Registro creado satisfactoriamente');
    }
    public function edit(Autor $varaut){
      
         return view('pages.Autores.editaut', compact('varaut'));
    }
    public function update(Request $request, Autor $varaut){
        //return $request->all();
        //
        $varaut->Nombre_autor = $request->Nombre_autor;
        $varaut->save();
        $varaut = Autor::all();//paginar la tabla
        return view('pages.Autores.autores', compact('varaut'))->with('success','Registro Actualizado satisfactoriamente');//mensaje de actualizacion
    }
    public function destroy(Autor $varaut){//eliminar el autor
        //return $varaut;
        $varaut->delete();
        $varaut = Autor::all();//paginar la tabla
        return view('pages.Autores.autores', compact('varaut'))->with('success','Registro Eliminado ');
    }
}
