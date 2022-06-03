<?php

namespace App\Http\Controllers;

use App\Models\Licenciatura;
use Illuminate\Http\Request;

class LicenciaturaController extends Controller
{
    //
    public function index(){
        //listado
        $varlic = Licenciatura::all();
        return view('pages.Carreras.licenciaturas', compact('varlic'));
    }
    public function create(){
        //Boton de registro
        return view('pages.Carreras.agregarLicenciatura');
    }
    public function store(Request $request){
        //Para rHacer el registro a la base de datos
        $data= request()->validate([ 'Nombre_licenciatura'=>'required'
            ], [

                'Nombre_licenciatura.required'=>'El campo nombre es obligatorio'
            ]);
        Licenciatura::create([
            'Nombre_licenciatura'=>$data['Nombre_licenciatura']
        ]);
        return back()->with('success','Registro creado satisfactoriamente');
    }
    public function edit(licenciatura $varlic){
        //dd($id);
        //$Evar= Licenciatura::find($id);
         return view('pages.Carreras.edit', compact('varlic'));
    }
    public function update(Request $request, licenciatura $varlic){
        //return $request->all();
        //
        $varlic->Nombre_licenciatura = $request->Nombre_licenciatura;
        $varlic->save();
        $varlic = Licenciatura::all();//paginar la tabla
        return view('pages.Carreras.licenciaturas', compact('varlic'))->with('success','Registro Actualizado satisfactoriamente');//mensaje de actualizacion
    }
    public function destroy(licenciatura $varlic){
        $varlic->delete();
        $varlic = Licenciatura::all();//paginar la tabla
        return view('pages.Carreras.licenciaturas', compact('varlic'))->with('success','Registro Eliminado ');
    }
}
