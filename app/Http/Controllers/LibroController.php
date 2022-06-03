<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Editorial;
use App\Models\Categoria;
use App\Models\Autor;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    //
    public function index(){
        $varlib=Libro::paginate(5);
        return view('pages.Libros.maps', compact('varlib'));
    }
    public function create(){
        $categori=Categoria::all();
        $editoria=Editorial::all();
        $auto=Autor::all();
        return view('pages.Libros.agregarLibro', compact('categori','editoria','auto'));
    }
    public function store(Request $request){
        //Para rHacer el registro a la base de datos
        $data= request()->validate([ 'Nombre_libro'=>'required','id_autor'=>'required','id_editorial'=>'required','id_categoria'=>'required'
            ], [

                'Nombre_libro.required'=>'El campo matricula es obligatorio',
                'id_autor.required'=>'El campo nombre es obligatorio',
                'id_editorial.required'=>'El campo usuario es obligatorio',
                'id_categoria.required'=>'El campo password es obligatorio',
            ]);
        Libro::create([
            'Nombre_libro'=>$data['Nombre_libro'],
            'id_autor'=>$data['id_autor'],
            'id_editorial'=>$data['id_editorial'],
            'id_categoria'=>$data['id_categoria']
        ]);
        return back()->with('success','Registro creado satisfactoriamente');
    }
    public function edit(Libro $varlib){
        $categori=Categoria::all();
        $editoria=Editorial::all();
        $auto=Autor::all();
         return view('pages.Libros.editarLibro', compact('varlib', 'categori', 'editoria','auto'));
    }
    public function update(Request $request, Libro $varlib){
        $varlib->Nombre_libro = $request->Nombre_libro;
        $varlib->id_autor = $request->id_autor;
        $varlib->id_editorial = $request->id_editorial;
        $varlib->id_categoria = $request->id_categoria;
        $varlib->save();
        $varlib = Libro::paginate(5);//paginar la tabla
        return view('pages.Libros.maps', compact('varlib'))->with('success','Registro Actualizado satisfactoriamente');//mensaje de actualizacion
    }
    public function destroy(Libro $varlib){
        $varlib->delete();
        $varlib = Libro::paginate(5);//paginar la tabla
        return view('pages.Libros.maps', compact('varlib'))->with('success','Registro Eliminado ');
    }
}
