<?php

namespace App\Http\Controllers;

use App\Models\Editorial;
use Illuminate\Http\Request;

class EditorialController extends Controller
{
    //
    public function index(){
        //listado
        $varedi = Editorial::all();
        return view('pages.Editoriales.editoriales', compact('varedi'));
    }
    public function create(){
        //Boton de registro
        return view('pages.Editoriales.agregarEditorial');
    }
    public function store(Request $request){
        //Para rHacer el registro a la base de datos
        $data= request()->validate([ 'Nombre_editorial'=>'required'
            ], [

                'Nombre_editorial.required'=>'El campo nombre es obligatorio'
            ]);
        Editorial::create([
            'Nombre_editorial'=>$data['Nombre_editorial']
        ]); 
        return back()->with('success','Registro creado satisfactoriamente');
    }
    public function edit(Editorial $varedi){
      
         return view('pages.Editoriales.editedi', compact('varedi'));
    }
    public function update(Request $request, Editorial $varedi){
        //return $request->all();
        //
        $varedi->Nombre_editorial = $request->Nombre_editorial;
        $varedi->save();
        $varedi = Editorial::paginate(5);//paginar la tabla
        return view('pages.Editoriales.editoriales', compact('varedi'))->with('success','Registro Actualizado satisfactoriamente');//mensaje de actualizacion
    }
    public function destroy(Editorial $varedi){
        $varedi->delete();
        $varedi = Editorial::paginate(5);//paginar la tabla
        return view('pages.Editoriales.editoriales', compact('varedi'))->with('success','Registro Eliminado ');
    }
}
