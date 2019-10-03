<?php

namespace App\Http\Controllers;

use App\ProgramaEducativo;
use Illuminate\Http\Request;

class ProgramaEducativoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programas = ProgramaEducativo::all();
        return view('programas.programaIndex', compact('programas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('programas.programaForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProgramaEducativo::create($request->all());
        return redirect()->route('programa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProgramaEducativo  $programaEducativo
     * @return \Illuminate\Http\Response
     */
    public function show(ProgramaEducativo $programaEducativo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProgramaEducativo  $programaEducativo
     * @return \Illuminate\Http\Response
     */
    public function edit(ProgramaEducativo $programaEducativo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProgramaEducativo  $programaEducativo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProgramaEducativo $programaEducativo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProgramaEducativo  $programaEducativo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProgramaEducativo $programaEducativo)
    {
        //
    }
}
