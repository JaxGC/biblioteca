<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use App\Models\User;
use Illuminate\Http\Request;

class BitacoraController extends Controller
{
    //
    public function index(){
        $rol=User::find(auth()->user()->id);
        
        if($rol->rol=='Admin')
        {
        $varPres = Prestamo::join('libros','prestamos.id_libro','=','libros.id')
        ->join('users','prestamos.id_alumno','=','users.id')
        ->where('prestamos.devolucion','=','2')
        ->select('prestamos.*','libros.Nombre_libro','users.name as Alumno')
        ->orderby('prestamos.estado_prestamo','asc')
        ->get();
        }else{
            $varPres = Prestamo::join('libros','prestamos.id_libro','=','libros.id')
            ->join('users','prestamos.id_alumno','=','users.id')
            ->where('users.id','=',auth()->user()->id)
            ->select('prestamos.*','libros.Nombre_libro','users.name as Alumno')
            ->orderby('prestamos.estado_prestamo','asc')
            ->get();
        }
        return view('pages.bitacora', compact('varPres'));
    }
    public function create(){
        
    }
    public function show($cursos){

    }
    public function delete(){
        
    }
}
