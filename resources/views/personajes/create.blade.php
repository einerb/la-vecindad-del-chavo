@extends('layouts.layout')
@section('title', 'Crear personaje')
@section('content')
<div class="container">
    <h2>Nuevo inquilino</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Inicio</a></li>
            <li class="breadcrumb-item"><a href="/personajes">Personajes</a></li>
            <li class="breadcrumb-item active" aria-current="page">Crear</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Cargar personaje</h4>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                    @endif

                    <form class="form-group" method="post" action="{{ route('personajes.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="foto">Foto del personaje *</label><br>
                            <input type="file" name="foto" id="foto" required>
                        </div>
                        <div class="form-group">
                            <label for="txtNombre">Título del personaje *</label>
                            <input type="text" class="form-control" name="titulo" id="titulo"
                                placeholder="Título del personaje" require autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="txtNombre">Nombre del personaje *</label>
                            <input type="text" class="form-control" name="nombre" id="txtNombre"
                                placeholder="Nombre del personaje" require autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="apto">Número Apartamento *</label>
                            <input type="text" class="form-control" name="apto" id="apto" placeholder="# Apartamento"
                                autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" name="descripcion" id="descripcion" rows="3"
                                placeholder="Escribir alguna descripción..." style="resize:none;"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Cargar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection