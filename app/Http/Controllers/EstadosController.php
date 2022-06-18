<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\Localidade;
use App\Models\Municipio;
use Illuminate\Http\Request;

class EstadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      
        $estados=Estado::orderBy('nombre','asc')->get();
      
      //  $estados=Municipio::all()->where('estado_id', 1);
        //return $estados;
        return view('Estados.index',compact('estados'));

    }

    public function byMunicipio($estado_id)
    {
      
        return Municipio::where('estado_id', $estado_id)->orderBy('nombre','asc')->get();
     
    }
    public function byLocalidad($municipio_id)
    {
        return Localidade::where('municipio_id', $municipio_id)->orderBy('nombre','asc')->get();
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
