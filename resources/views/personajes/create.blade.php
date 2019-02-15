@extends('layouts.layout')
@section('title', 'Crear personaje')
@section('content')
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Cargar/Editar personaje</h4>
                    <form class="form-group" method="post" action="/personajes">
                        @csrf
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
                            <input type="text" class="form-control" name="txtName" id="txtNombre" placeholder="Nombre del personaje"
                                require autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="txtApto">Apartamento *</label>
                            <input type="text" class="form-control" name="txtApto" id="txtApto" placeholder="Apartamento"
                                autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="txtDescripcion">Descripción</label>
                            <textarea class="form-control" name="txtDescripcion" id="txtDescripcion" rows="3"
                                placeholder="Escribir alguna descripción..." style="resize:none;"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Cargar/Editar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection