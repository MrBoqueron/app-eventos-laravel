@extends('layouts.app')

@section('title', 'Eventos')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1>Crear Evento</h1>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <a href="{{ route('eventos') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{{ route('guardar_evento') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre" />
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea name="descripcion" id="descripcion"></textarea>
                </div>
                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="date" class="form-control" name="fecha" id="fecha" aria-describedby="helpId" placeholder="Fecha" />
                </div>
                <div class="mb-3">
                    <label for="hora" class="form-label">Hora</label>
                    <input type="time" class="form-control" name="hora" id="hora" aria-describedby="helpId" placeholder="Hora" />
                </div>
                <div class="mb-3">
                    <label for="lugar" class="form-label">Lugar</label>
                    <input type="text" class="form-control" name="lugar" id="lugar" aria-describedby="helpId" placeholder="Lugar" />
                </div>
                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen</label>
                    <input type="file" class="form-control" name="imagen" id="imagen" placeholder="" aria-describedby="fileHelpId" />
                </div>

                <button type="submit" class="btn btn-success">Guardar</button>

            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script>
    $(document).ready(function() {
        $('#descripcion').summernote({
            placeholder: 'Descripción',
            tabsize: 2,
            height: 100});
    });
</script>

@endsection