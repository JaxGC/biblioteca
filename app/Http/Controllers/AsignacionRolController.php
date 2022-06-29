<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AsignacionRolController extends Controller
{
  
    public function index()
    {
        $alumnos = User::all()->where('rol','=','Alum');
        $maestros = User::all()->where('rol','=','Maes');
        $administradores = User::all()->where('rol','=','Admin');
        $invitados = User::all()->where('rol','=','Invi');
        $Coadministradores = User::all()->where('rol','=','CoAdmin'); 
        $roles = Role::all();
        return view('pages.roles.indexRol', compact('alumnos','maestros','administradores','roles','Coadministradores','invitados'));
    }

    public function edit(User $alumnos)
    {
        //
        $alumnos = User::all(); 
        //return view('pages.roles.indexRol', compact('alumnos'));
    }

    public function update(Request $request, User $alum)
    {
        //Para asignar el rol al usuario
        
       if ($request->roles=='1') {
        $alum->rol = 'Admin';
        $alum->roles()->sync($request->roles);
        $alum->save();
       } 
        if ($request->roles=='2') {
            $alum->rol = 'Alum';
            $alum->roles()->sync($request->roles);
            $alum->save();
        } 
            if ($request->roles=='3') {
                $alum->rol = 'Maes';
                $alum->roles()->sync($request->roles);
                $alum->save();
            } 
                if ($request->roles=='4') {
                    $alum->rol = 'Invi';
                    $alum->roles()->sync($request->roles);
                    $alum->save();
                } 
                    if ($request->roles=='5'){
                        $alum->rol = 'CoAdmin';
                        $alum->roles()->sync($request->roles);
                        $alum->save();
                    }
        if (auth()->user()->rol!='Admin') {
            //return back()->with('success','Se asigno correctamente');
           return redirect()->route('home')->with('siaccess','ok');  
        }
        //return alert('info','No puedes ver esta página, permisos insuficientes');
         return redirect()->route('rolesUsu')->with('siaccess','ok'); 
    }

    public function destroy($id)
    {
        //
    }
}
