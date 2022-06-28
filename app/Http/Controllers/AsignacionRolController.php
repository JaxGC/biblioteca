<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AsignacionRolController extends Controller
{
  
    public function index()
    {
        $alumnos = User::all()->where('rol','=','Alum');
        $profesores = User::all()->where('rol','=','Maes');
        $administradores = User::all()->where('rol','=','Admin'); 
        return view('pages.roles.indexRol', compact('alumnos','profesores','administradores'));
    }

   
    public function create()
    {
        
        
    }

    public function store(Request $request)
    {
        //
        
    }

    public function show($id)
    {
        //
    }

    public function edit(User $alumnos)
    {
        //
        $alumnos = User::all(); 
        //return view('pages.roles.indexRol', compact('alumnos'));
    }

    public function update(Request $request, $id, $alum)
    {
        //Para asignar el rol al usuario
        $alum->rol = $request->roles;
        dd($alum);
        $id->roles()->sync($request->roles);
        return back()->with('info','Se asigno correctamente');
    }

    public function destroy($id)
    {
        //
    }
}
