<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Models\Estado;
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
        $estados=Estado::orderBy('nombre','asc')->get();
        return view('profile.edit', compact('estados'));
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        if (auth()->user()->id == 1) {
            return back()->withErrors(['not_allow_profile' => __('No se pueden cambiar los datos del usuario predeterminado.')]);
        }

        if($imagen = $request->file('imagen')){
            $rutaGuardarImg = 'imagen/';
            $imagenProducto = date('YmdHis') . "." . $imagen->getClientOriginalExtension(); 
            $imagen->move($rutaGuardarImg, $imagenProducto);
            auth()->user()->imagen_usuario = "$imagenProducto";
         }else{
            unset(auth()->user()->imagen_usuario);
         }

         auth()->user()->selectestado = $request->selectestado;
         auth()->user()->selectmunicipio = $request->selectmunicipio;
         auth()->user()->selectlocalidad = $request->selectlocalidad;
         auth()->user()->referencia = $request->referencia;

        auth()->user()->update($request->all());

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
        if (auth()->user()->id == 1) {
            return back()->withErrors(['not_allow_password' => __('No puedes cambiar la contraseña del usuario predeterminado.')]);
        }

        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Contraseña correctamente actualizada.'));
    }
}
