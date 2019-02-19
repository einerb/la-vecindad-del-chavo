@extends('layouts.layout') 
@section('title', 'Listado de personajes') 
@section('content')
<div class="container">
    @include('partials.success')
    <h3>Personajes de la Vecindad</h3>
    <a href="/personajes/create" class="btn btn-primary mt-4 mb-4">Cargar personaje</a>
    <div class="table-responsive mt-4">
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col" width="15%">Foto</th>
                    <th scope="col" width="15%">Nombres</th>
                    <th scope="col" width="45%">Descripción</th>
                    <th scope="col" width="10%">Apartamento</th>
                    <th colspan="2" scope="col" width="15%">Editar/Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($personajes as $persona)
                <tr>
                    <td><a href="/personajes/{{$persona->slug}}"><img src="/images/{{ $persona->avatar }}" alt="" width="50" class="rounded-circle"></a></td>
                    <td><a href="/personajes/{{$persona->slug}}">{{ $persona->titulo }} {{ $persona->nombre }}</a></td>
                    <td>{{ $persona->descripcion }}</td>
                    <td>{{ $persona->apartamento }}</td>
                    <td><a href="/personajes/{{$persona->slug}}/edit" class="btn btn-sm btn-primary" style="width: 70px;">Editar</a></td>
                    <td>
    @include('layouts.delete')</td>
                </tr>
                @endforeach @if(count($personajes)
                <=0 ) <tr>
                    <td colspan="5" class="font-weight-bolder text-muted h5">No hay registros</td>
                    </tr>
                    @endif
            </tbody>
        </table>
    </div>
</div>
@endsection