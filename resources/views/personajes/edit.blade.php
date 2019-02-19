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
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </div>
                    @endif {!! Form::model($persona, ['route'=>['personajes.update',$persona], 'method'=>'PUT','files'=>true]) !!}
                        @include('layouts.forms')
                    {!! Form::submit('Editar', ['class'=> 'btn btn-primary']) !!} {!! Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection