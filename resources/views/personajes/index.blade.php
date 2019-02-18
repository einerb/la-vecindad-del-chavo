@extends('layouts.layout')
@section('title', 'Listado de personajes')
@section('content')
<div class="container">
    <h3>Personajes de la Vecindad</h3>
    <a href="/personajes/create" class="btn btn-primary mt-4 mb-4">Cargar personaje</a>
    <div class="table-responsive mt-4">
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">Foto</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Apartamento</th>
                    <th colspan="2" scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($personajes as $persona)
                <tr>
                    <td><a href="/personajes/{{$persona->slug}}"><img src="/images/{{ $persona->avatar }}" alt="" width="50" class="rounded-circle"></a></td>
                    <td><a href="/personajes/{{$persona->slug}}">{{ $persona->titulo }} {{ $persona->nombre }}</a></td>
                    <td>{{ $persona->descripcion }}</td>
                    <td>{{ $persona->apartamento }}</td>
                    <td><a href="/personajes/{{$persona->slug}}/edit">Editar</a></td>
                    <td><a href="{{ route('personajes.destroy', $persona->slug) }}">Eliminar</a></td>
                </tr>
                @endforeach
                @if(count($personajes) <= 0) <tr>
                    <td colspan="5" class="font-weight-bolder text-muted h5">No hay registros</td>
                    </tr>
                    @endif
            </tbody>
        </table>
    </div>
</div>
@endsection