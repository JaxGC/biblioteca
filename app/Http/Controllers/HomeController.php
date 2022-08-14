<?php

namespace App\Http\Controllers;

use App\Models\Invitado;
use App\Models\Libro;
use App\Models\Prestamo;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        ///AQUI SE VERIFICAN LOS USUARIOS DEL LOGIN

        Invitado::create([
            'Name_invitados'=>auth()->user()->name,
            'password'=>auth()->user()->rol
        ]);
       
        $contadorMae = Invitado::where('Password', 'Maes')
        ->whereDate('created_at', Carbon::today())
        ->count();
        $contadorAlum = Invitado::where('Password', 'Alum')
        ->whereDate('created_at', Carbon::today())
        ->count();
        $contadorInvi = Invitado::where('Password', 'Invi')
        ->whereDate('created_at', Carbon::today())
        ->count();
        $contadorlibros = Libro::count();
        $contadorPresPausados = Prestamo::where('estado_prestamo','=','0')->count();
        $contadorPresActivos = Prestamo::where('estado_prestamo','=','1')->count();
        $contadorPresFinalizados = Prestamo::where('estado_prestamo','=','2')->count();

        //para usuarios
        $contadorPresPausados0 = Prestamo::join('users','prestamos.id_alumno','=','users.id')
        ->where('estado_prestamo','=','0')
        ->where('users.id','=',auth()->user()->id)
        ->count();
        $contadorPresActivos1 = Prestamo::join('users','prestamos.id_alumno','=','users.id')
        ->where('estado_prestamo','=','1')
        ->where('users.id','=',auth()->user()->id)
        ->count();
        $contadorPresFinalizados2 = Prestamo::join('users','prestamos.id_alumno','=','users.id')
        ->where('estado_prestamo','=','2')
        ->where('users.id','=',auth()->user()->id)
        ->count();

        if (auth()->user()->id_status_usuario==1) {
            return view('dashboard', 
            compact('contadorMae', 'contadorlibros', 'contadorAlum','contadorInvi','contadorPresPausados',
            'contadorPresActivos','contadorPresFinalizados','contadorPresPausados0','contadorPresActivos1',
            'contadorPresFinalizados2'));
        } else {
            //dd('estas bloqueado');
            return view('Bloqueados');
        }
        
        
    }
}
