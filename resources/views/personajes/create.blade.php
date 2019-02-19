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
                    </div>
                    @endif
                    
                    {{-- Formulario --}}
                    {!! Form::open(['route'=> 'personajes.store', 'method'=> 'POST', 'files'=>true]) !!}
                        @include('layouts.forms') {!!
                    Form::submit('Cargar', ['class'=> 'btn btn-success']) !!} {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection