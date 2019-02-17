<?php

namespace LaVecindadDelChavo\Http\Controllers;

use Illuminate\Http\Request;
use LaVecindadDelChavo\Personaje;

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
        if($request->hasFile('txtAvatar')){
            $file = $request->file('txtAvatar');
            $nameFile = time().'-'.$file->getClientOriginalName();
            $file->move(public_path().'/images/',$nameFile);
        }

        $personaje = new Personaje();
        $personaje->titulo = $request->input('txtTitulo');
        $personaje->nombre = $request->input('txtName');
        $personaje->apartamento = $request->input('txtApto');
        $personaje->descripcion = $request->input('txtDescripcion');
        $personaje->avatar = $nameFile;
        $personaje->save();

        return 'Personaje cargado';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $persona = Personaje::find($id);
        return view('personajes.details', compact('persona'));
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