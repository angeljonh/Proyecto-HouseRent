<?php

namespace App\Http\Controllers;

use App\Propiedad;
use App\Zona;
use App\User;
use Illuminate\Http\Request;

class PropiedadController extends Controller
{
    public function index()
    {
        $propiedades = Propiedad::where('user_id', \Auth::id())->get();
        return view('propiedades.propiedadIndex', compact('propiedades'));
    }

    public function inicio()
    {
        $propiedads = Propiedad::all();
        return view('inicio', compact('propiedads'));
    }

    public function acerca()
    {
        return view('acerca');
    }

    public function propiedad()
    {
        $propiedads = Propiedad::all();
        return view('propiedad',compact('propiedads'));
    }

    public function contacto()
    {
        return view('contacto');
    }

    public function blog()
    {
        return view('blog');
    }

    public function create()
    {
        $zonas = Zona::pluck('zona' , 'id');
        return view('propiedades.propiedadForm', compact('zonas'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:1|max:100',
            'descripcion' => 'required|min:1|max:100',
            'domicilio' => 'required|min:1|max:100',
            'numero' => 'required|min:1|max:5',
            'zona_id' => 'required|min:1',
            'cp' => 'required|min:5|max:5',
            'precio' => 'required|min:1|max:10',
            'area' => 'required|min:1|max:10',
            'camas' => 'required|min:1|max:10',
            'cuartos' => 'required|min:1|max:10',
            'baños' => 'required|min:1|max:10',
            'telefono' => 'required|min:10|max:10',
        ]);

        //Propiedad::create($request->all());
        
        $propiedad = new Propiedad([
            'user_id' => \Auth::id(),
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'domicilio' => $request->domicilio,
            'numero' => $request->numero,
            'zona_id' => $request->zona_id,
            'cp' => $request->cp,
            'precio' => $request->precio,
            'area' => $request->area,
            'camas' => $request->camas,
            'cuartos' => $request->cuartos,
            'baños' => $request->baños,
            'telefono' => $request->telefono,
            ]
        );

        $propiedad->save();

        //$zona = Zona::find($request->zona);
        //$zona->propiedads()->save($propiedad);

        
        return redirect()->route('propiedad.show', $propiedad->id);
    }


    public function show(Propiedad $propiedad)
    {
        return view('propiedades.propiedadShow', compact('propiedad'));
    }

    public function show1(Propiedad $propiedad)
    {
        return view('propiedades.propiedadSingle', compact('propiedad'));
    }


    public function edit(Propiedad $propiedad)
    {
        $zonas = Zona::pluck('zona' , 'id');
        return view('propiedades.propiedadForm', compact('propiedad','zonas'));
    }


    public function update(Request $request, Propiedad $propiedad)
    {
        $request->validate([
            'nombre' => 'required|min:1|max:100',
            'descripcion' => 'required|min:1|max:100',
            'domicilio' => 'required|min:1|max:100',
            'numero' => 'required|min:1|max:5',
            'zona_id' => 'required|min:1',
            'cp' => 'required|min:5',
            'precio' => 'required|min:1|max:10',
            'area' => 'required|min:1|max:10',
            'camas' => 'required|min:1|max:10',
            'cuartos' => 'required|min:1|max:10',
            'baños' => 'required|min:1|max:10',
            'telefono' => 'required|min:10|max:10',
        ]);
        $propiedad->nombre = $request->nombre;
        $propiedad->domicilio = $request->domicilio;
        $propiedad->numero = $request->numero;
        $propiedad->zona_id = $request->zona_id;
        $propiedad->cp = $request->cp;
        $propiedad->precio = $request->precio;
        $propiedad->area = $request->area;
        $propiedad->camas = $request->camas;
        $propiedad->cuartos = $request->cuartos;
        $propiedad->baños = $request->baños;
        $propiedad->telefono = $request->telefono;
        $propiedad->save();

        return redirect()->route('propiedad.index');
    }

    public function destroy(propiedad $propiedad)
    {
        $propiedad->delete();
        return redirect()->route('propiedad.index');
    }
}
