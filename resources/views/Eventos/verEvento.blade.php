@extends('layouts.app')

@section('title', 'Evento')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1>Evento {{ $evento->nombre }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-3">
            <a href="{{ route('eventos') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-3">
            <h2>{{ $evento->nombre }}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-3">
            {!!$evento->descripcion!!}
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-3">
            <p>{{ $evento->fecha }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-3">
            <p>{{ $evento->hora }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-3">
            <p>{{ $evento->lugar }}</p>
        </div>
    </div> 
</div>

@endsection