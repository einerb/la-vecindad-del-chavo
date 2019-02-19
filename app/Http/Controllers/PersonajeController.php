<?php

namespace LaVecindadDelChavo\Http\Controllers;

use LaVecindadDelChavo\Personaje;
use Illuminate\Http\Request;
use LaVecindadDelChavo\Http\Requests\StorePersonajeRequest;

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
    public function store(StorePersonajeRequest $request)
    {
        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $nameFile = time().'-'.$file->getClientOriginalName();
            $file->move(public_path().'/images/',$nameFile);
        }

        $personaje = new Personaje();
        $personaje->titulo = ucwords($request->input('titulo'));
        $personaje->nombre = ucwords($request->input('nombre'));
        $personaje->apartamento = $request->input('apartamento');
        $personaje->descripcion = ucwords($request->input('descripcion'));
        $personaje->avatar = $nameFile;
        $personaje->slug = $request->input('nombre');
        $personaje->save();

        return redirect()->route('personajes.index')->with('created','Personaje creado con éxito');
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
            'foto'=>'image',
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

        return redirect()->route('personajes.show', [$personaje])->with('updated','Personaje actualizado con éxito');;
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
        $file_path= public_path().'/images/'.$persona->avatar;
        \File::delete($file_path);
        $persona->delete();

        return redirect()->route('personajes.index')->with('deleted','Personaje eliminado con éxito');;
    }
}