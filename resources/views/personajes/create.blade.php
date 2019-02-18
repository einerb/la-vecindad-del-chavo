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
                    <h4 class="card-title mb-4">Cargar/Editar personaje</h4>
                    <form class="form-group" method="post" action="/personajes" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="file" name="txtAvatar" id="txtAvatar">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="txtTitulo">
                                <option>Seleccione título</option>
                                <option>Don</option>
                                <option>Doña</option>
                                <option>Sr</option>
                                <option>Sra</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="txtNombre">Nombre del personaje *</label>
                            <input type="text" class="form-control" name="txtName" id="txtNombre"
                                placeholder="Nombre del personaje" require autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="txtApto">Apartamento *</label>
                            <input type="text" class="form-control" name="txtApto" id="txtApto"
                                placeholder="Apartamento" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="txtDescripcion">Descripción</label>
                            <textarea class="form-control" name="txtDescripcion" id="txtDescripcion" rows="3"
                                placeholder="Escribir alguna descripción..." style="resize:none;"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Cargar/Editar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection