@extends('layouts.layout') 
@section('title', 'Información personal') 
@section('content')
<div class="container">
    @include('partials.success')
    <h2 class="text-capitalize">{{ $persona->titulo }} {{ $persona->nombre }}</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Inicio</a></li>
            <li class="breadcrumb-item"><a href="/personajes">Personajes</a></li>
            <li class="breadcrumb-item active" aria-current="page">Información personal</li>
        </ol>
    </nav>
    <div class="row mt-4">
        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3"><img src="/images/{{$persona->avatar}}" width="100%" style="border-radius:15px;"></div>
        <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
            <h4>Descripción <a href="/personajes/{{$persona->slug}}/edit" style="font-size:12px;">Editar</a></h4>
            <p class="text-muted mt-4 mb-4">{{ $persona->descripcion }}</p>
            <p><span class="font-weight-bold">Número apartamento:</span> {{ $persona->apartamento }}</p>
            <hr>
            <h4>Apodos <a href="#" style="font-size:12px;">Nuevo</a></h4>
            <p>cc</p>
            <hr>
        </div>
    </div>
</div>
@endsection