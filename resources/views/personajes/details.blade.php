@extends('layouts.layout')
@section('title', 'Información personal')
@section('content')
<div class="container">
    <h2>{{ $persona->titulo }} {{ $persona->nombre }}</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/personajes">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Información personal</li>
        </ol>
    </nav>
    <div class="row mt-4">
        <div class="col-md-3"><img src="/images/{{$persona->avatar}}" width="100%" style="border-radius:15px;"></div>
        <div class="col-md-9">
            <h4>Descripción</h4>
            <p class="text-muted mt-4 mb-4">{{ $persona->descripcion }}</p>
            <p><span class="font-weight-bold">A</span>partamento{{ $persona->apartamento }}</p>
            <hr>
            <h4>Apodos</h4>
            <p>cc</p><hr>
            <a href="" class="btn btn-sm btn-success">Nuevo apodo</a>
        </div>
    </div>
</div>
@endsection