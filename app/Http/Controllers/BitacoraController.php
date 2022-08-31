<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class BitacoraController extends Controller
{
    //
    public function tipo_estado1($estado_prestamo){
        $rol=User::find(auth()->user()->id);
        if($estado_prestamo==1 && $rol->rol=='Alum')
       {
           
        $varPres = Prestamo::join('libros','prestamos.id_libro','=','libros.id')
        ->join('users','prestamos.id_alumno','=','users.id')
        ->where('users.id','=',auth()->user()->id)
        ->where('prestamos.estado_prestamo','=','1')
        ->select('prestamos.*','libros.Nombre_libro','users.name as Alumno')
        ->orderby('prestamos.estado_prestamo','asc')
        ->get();
        return view('pages.bitacora', compact('varPres'));
       }
       else
       {
           if($estado_prestamo==0)
           {
            $varPres = Prestamo::join('libros','prestamos.id_libro','=','libros.id')
            ->join('users','prestamos.id_alumno','=','users.id')
            ->where('users.id','=',auth()->user()->id)
            ->where('prestamos.estado_prestamo','=','0')
            ->select('prestamos.*','libros.Nombre_libro','users.name as Alumno')
            ->orderby('prestamos.estado_prestamo','asc')
            ->get();
            return view('pages.bitacora', compact('varPres'));
               
           }
       }
   
   }




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
    public function rangopdf(Request $request){
        $fi = $request->fecha_ini.' 00:00:00';
        $ff = $request->fecha_fin.' 23:59:59';
        $rangoPdf=Prestamo::orderBy('fecha_inicio', 'desc')
        ->join('libros','prestamos.id_libro','=','libros.id')
        ->join('users','prestamos.id_alumno','=','users.id')
        ->whereBetween('fecha_inicio', [$fi, $ff])
        ->where('prestamos.devolucion','=','2')
        ->select('prestamos.*','libros.*','users.*')
        ->get();
        $pdf = Pdf::loadView('pages.Prestamos.pdfFechas', compact('rangoPdf'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream();
    }
}
