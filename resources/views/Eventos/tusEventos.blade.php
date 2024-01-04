@extends('layouts.app')

@section('title', 'Tus Eventos')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1>Eventos</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-3">
            <a href="{{ route('crear_evento') }}" class="btn btn-primary">Crear nuevo evento</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-3">
            <a href="{{ route('eventos') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-3">
            <h2>Tus eventos</h2>
        </div>
    </div>
    <div class="row mt-3">
        @foreach ($eventos as $evento)
        <div class="col-md-4">
            <div class="card mb-4">
                <img class="card-img-top" src="{{ asset('storage/eventos/' . $evento->imagen) }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $evento->nombre }}</h5>
                    <p class="card-text">{{!!$evento->descripcion!!}}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('ver_evento', $evento->id) }}" class="btn btn-success">Ver</a>
                    <a href="{{ route('editar_evento', $evento->id) }}" class="btn btn-warning">Editar</a>
                    <a href="{{ route('eliminar_evento', $evento->id) }}" class="btn btn-danger">Eliminar</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>

@endsection