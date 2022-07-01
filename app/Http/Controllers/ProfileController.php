<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Models\Estado;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $varEdit=User::join('estados as e','users.selectestado','e.id')
        ->join('municipios as m','users.selectmunicipio','m.id')
        ->join('localidades as l','users.selectlocalidad','l.id')
        ->select('users.*','e.nombre as estado','e.id as idestado','m.nombre as municipio','m.id as idmunicipio','l.nombre as localidad','l.id as idlocalidad')
        ->find(auth()->user()->id);
        //return $varEdit;
        $estados=Estado::orderBy('nombre','asc')->get();
        return view('profile.edit', compact('estados','varEdit'));
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        /* if (auth()->user()->id == 1) {
            return back()->withErrors(['not_allow_profile' => __('No se pueden cambiar los datos del usuario predeterminado.')]);
        } */

        if($imagen = $request->file('imagen')){
            $rutaGuardarImg = 'imagen/';
            $imagenProducto = date('YmdHis') . "." . $imagen->getClientOriginalExtension(); 
            $imagen->move($rutaGuardarImg, $imagenProducto);
            auth()->user()->imagen_usuario = "$imagenProducto";
            auth()->user()->update(['imagen_usuario' => $imagenProducto]);
         }else{
            unset(auth()->user()->imagen_usuario);
         }
/* 
         auth()->user()->selectestado = $request->selectestado;
         auth()->user()->selectmunicipio = $request->selectmunicipio;
         auth()->user()->selectlocalidad = $request->selectlocalidad;
         auth()->user()->referencia = $request->referencia; */

         auth()->user()->update(['selectestado' => $request->selectestado]);
         auth()->user()->update(['selectmunicipio' => $request->selectmunicipio]);
         auth()->user()->update(['selectlocalidad' => $request->selectlocalidad]);
         auth()->user()->update(['referencia' => $request->referencia]);

        return back()->withStatus(__('Perfil correctamente actualizado.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        /* if (auth()->user()->id == 1) {
            return back()->withErrors(['not_allow_password' => __('No puedes cambiar la contraseña del usuario predeterminado.')]);
        } */

        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Contraseña correctamente actualizada.'));
    }
}
