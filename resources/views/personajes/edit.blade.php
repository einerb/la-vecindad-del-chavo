@extends('layouts.layout')
@section('title', 'Editar personaje')
@section('content')
<div class="container">
    <h2>Editar <span class="text-capitalize">{{$persona->titulo}} {{$persona->nombre}}</span></h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Inicio</a></li>
            <li class="breadcrumb-item"><a href="/personajes">Personajes</a></li>
            <li class="breadcrumb-item"><a href="/personajes/{{$persona->slug}}"><span
                        class="text-capitalize">{{$persona->titulo}} {{$persona->nombre}}</span></a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Editar personaje</h4>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                    @endif
                    <form class="form-group" method="post" action="{{ route('personajes.update', $persona->slug) }}"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <input type="file" name="foto" id="foto">
                        </div>
                        <div class="form-group">
                            <label for="txtNombre">Título del personaje *</label>
                            <input type="text" class="form-control" name="titulo" value="{{$persona->titulo}}"
                                id="titulo" placeholder="Título del personaje" require autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="txtNombre">Nombre del personaje *</label>
                            <input type="text" class="form-control" name="nombre" id="txtNombre"
                                value="{{$persona->nombre}}" placeholder="Nombre del personaje" require
                                autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="apto">Número Apartamento *</label>
                            <input type="text" class="form-control" name="apartamento" id="apto"
                                value="{{$persona->apartamento}}" placeholder="# Apartamento" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" name="descripcion" id="descripcion" rows="3"
                                placeholder="Escribir alguna descripción..."
                                style="resize:none;">{{$persona->descripcion}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Editar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection