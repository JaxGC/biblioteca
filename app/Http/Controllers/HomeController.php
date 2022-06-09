<?php

namespace App\Http\Controllers;

use App\Models\Invitado;
use App\Models\Libro;
use Carbon\Carbon;

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
        return view('dashboard', compact('contadorMae', 'contadorlibros', 'contadorAlum','contadorInvi'));
    }
}
