<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Laravel\Ui\AuthRouteMethods;

class CategoriaController extends Controller
{
    //
    public function index(){
        //listado
        $varcat = Categoria::paginate(5);
        return view('pages.Categorias.categoria', compact('varcat'));
    }
    public function create(){
        //Boton de registro
        return view('pages.Categorias.agregarCategoria');
    }
    public function store(Request $request){
        //Para rHacer el registro a la base de datos
        $data= request()->validate([ 'Nombre_categoria'=>'required'
            ], [

                'Nombre_categoria.required'=>'El campo nombre es obligatorio'
            ]);
        Categoria::create([
            'Nombre_categoria'=>$data['Nombre_categoria']
        ]); 
        return back()->with('success','Registro creado satisfactoriamente');
    }
    public function edit(Categoria $varcat){
      
         return view('pages.Categorias.editcate', compact('varcat'));
    }
    public function update(Request $request, Categoria $varcat){
        //return $request->all();
        //
        $varcat->Nombre_categoria = $request->Nombre_categoria;
        $varcat->save();
        $varcat = Categoria::paginate(5);//paginar la tabla
        return view('pages.Categorias.categoria', compact('varcat'))->with('success','Registro Actualizado satisfactoriamente');//mensaje de actualizacion
    }
    public function destroy(Categoria $varcat){
        $varcat->delete();
        $varcat = Categoria::paginate(5);//paginar la tabla
        return view('pages.Categorias.categoria', compact('varcat'))->with('success','Registro Eliminado ');
    }
}