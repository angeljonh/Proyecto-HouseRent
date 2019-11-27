<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatoController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = Dato::with('propiedad:id,nombre')->get();
        return view('datos.datoIndex', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $propiedads = Propiedad::pluck('nombre', 'id');
        return view('datos.datoForm', compact('propiedads'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Agrega user_id a $request
        $request->merge(['user_id' => \Auth::id()]);

        //Crea un nuevo dato con la información del formulario + user_id
        $dato = Dato::create($request->all());

        //Relaciona el dato con los propiedads seleccionados
        $dato->propiedads()->attach($request->propiedad_id);

        return redirect()->route('dato.show', $dato->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Dato $dato)
    {
        return view('datos.datoShow', compact('dato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dato $dato)
    {
        $propiedads = Propiedad::pluck('nombre', 'id');
        $seleccionados = $dato->propiedads()->pluck('id');

        return view('datos.datoForm', compact('propiedads', 'dato', 'seleccionados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dato $dato)
    {
        $dato->nombre = $request->nombre;
        $dato->descripcion = $request->descripcion;
        $dato->save();
        $dato->propiedads()->sync($request->propiedad_id);

        return redirect()->route('dato.show', $dato->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dato $dato)
    {
        //
    }
}
