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
        $varlib=Libro::all();
        
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
        $data= request()->validate([ 'Nombre_libro'=>'required',
        'id_autor'=>'required',
        'id_editorial'=>'required',
        'year_edicion'=>'required',
        'fecha_publicacion'=>'required',
        'id_categoria'=>'required',
        'ejemplares'=>'required',
        'libros_prestados'=>'required',
        'estado'=>'required',
        'observaciones'=>'required',
        'imagen' => 'required|image|mimes:jpeg,png,svg|max:1024',
        'numero_stand'=>'required'

            ], [

                'Nombre_libro.required'=>'El campo es obligatorio',
                'id_autor.required'=>'El campo  es obligatorio',
                'id_editorial.required'=>'El campo  es obligatorio',
                'year_edicion.required'=>'El campo es obligatorio',
                'fecha_publicacion.required'=>'El campo es obligatorio',
                'id_categoria.required'=>'El campo  es obligatorio',
                'ejemplares.required'=>'El campo es obligatorio',
                'libros_prestados.required'=>'El campo  es obligatorio',
                'estado.required'=>'El campo  es obligatorio',
                'observaciones.required'=>'El campo  es obligatorio'


            ]);
            if($imagen = $request->file('imagen')) {
                $rutaGuardarImg = 'imagen_libro/';
                $imagenProducto = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
                $imagen->move($rutaGuardarImg, $imagenProducto);
                $data['imagen'] = "$imagenProducto";             
            }
        Libro::create([
            'Nombre_libro'=>$data['Nombre_libro'],
            'id_autor'=>$data['id_autor'],
            'id_editorial'=>$data['id_editorial'],
            'year_edicion'=>$data['year_edicion'],
            'fecha_publicacion'=>$data['fecha_publicacion'],
            'id_categoria'=>$data['id_categoria'],
            'ejemplares'=>$data['ejemplares'],
            'libros_prestados'=>$data['libros_prestados'],
            'estado'=>$data['estado'],
            'observaciones'=>$data['observaciones'],
            'imagen'=>$data['imagen'],
            'numero_stand'=>$data['numero_stand']
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
        $varlib->year_edicion=$request->year_edicion;
        $varlib->id_editorial = $request->id_editorial;
        $varlib->id_categoria = $request->id_categoria;
        $varlib->ejemplares=$request->ejemplares;
        $varlib->libros_prestados = $request->libros_prestados;
        $varlib->estado = $request->estado;
        $varlib->observaciones=$request->observaciones;
        $varlib->numero_stand = $request->numero_stand;

        $imagenOld = $varlib->imagen;
        //dd($imagenOld);
        if($imagen = $request->file('imagen')){
            //Para eliminar imagen anterior de la ruta
            if ($imagenOld!="") {
                unlink('imagen_libro/'.$imagenOld);
            }

            $rutaGuardarImg = 'imagen_libro/';
            $imagenProducto = date('YmdHis') . "." . $imagen->getClientOriginalExtension(); 
            $imagen->move($rutaGuardarImg, $imagenProducto);
            $varlib['imagen'] = "$imagenProducto";
         }else{
            unset($varlib['imagen']);
         }

        $varlib->save();
        $varlib = Libro::paginate(5);//paginar la tabla
        return view('pages.Libros.maps', compact('varlib'))->with('success','Registro Actualizado satisfactoriamente');//mensaje de actualizacion
    }
    public function destroy(Libro $varlib){
        $imagenOld = $varlib->imagen;
        if ($imagenOld!="") {
            unlink('imagen_libro/'.$imagenOld);
        }
        $varlib->delete();
        $varlib = Libro::paginate(5);//paginar la tabla
        return view('pages.Libros.maps', compact('varlib'))->with('success','Registro Eliminado ');
    }
}
