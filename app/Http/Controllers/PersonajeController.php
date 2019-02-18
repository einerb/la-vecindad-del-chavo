<?php

namespace LaVecindadDelChavo\Http\Controllers;

use LaVecindadDelChavo\Personaje;
use Illuminate\Http\Request;

class PersonajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personajes = Personaje::all();
        return view('personajes.index', compact('personajes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('personajes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $nameFile = time().'-'.$file->getClientOriginalName();
            $file->move(public_path().'/images/',$nameFile);
        }

        $request->validate([
            'nombre'=> 'required',
            'descripcion' => 'required'
        ]);

        $personaje = new Personaje();
        $personaje->titulo = ucwords($request->input('titulo'));
        $personaje->nombre = ucwords($request->input('nombre'));
        $personaje->apartamento = $request->input('apto');
        $personaje->descripcion = ucwords($request->input('descripcion'));
        $personaje->avatar = $nameFile;
        $personaje->slug = $request->input('nombre');
        $personaje->save();

        return redirect('/personajes')->with('success', 'Personaje cargado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $persona = Personaje::where('slug','=',$slug)->firstOrFail();
        return view('personajes.show', compact('persona'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $persona = Personaje::where('slug','=',$slug)->firstOrFail();
        return view('personajes.edit', compact('persona'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {       
        $request->validate([
            'nombre'=> 'required',
            'descripcion' => 'required'
        ]);

        $personaje = Personaje::where('slug','=',$slug)->firstOrFail();
        $personaje->fill($request->except('foto'));
        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $nameFile = time().'-'.$file->getClientOriginalName();
            $personaje->avatar = $nameFile;
            $file->move(public_path().'/images/',$nameFile);
        }
        $personaje->save();

        return redirect('/personajes/')->with('success', 'Personaje actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $persona = Personaje::where('slug','=',$slug)->firstOrFail();
        $persona.delete();

        return redirect('/personajes/')->with('success', 'Personaje eliminado');
    }
}