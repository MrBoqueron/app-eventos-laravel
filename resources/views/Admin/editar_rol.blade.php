@extends('layouts.app')

@section('title', 'Editar Rol')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5 mb-5">
            <h1>Editar Rol</h1>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-8">
        <form action="{{ route('admin.actualizar_rol', $role->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre del Rol</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $role->name) }}">
                </div>
                <div class="mb-3">
                    <label for="permissions" class="form-label">Permisos</label>
                    <div class="form-check" >
                        @foreach ($permissions as $permission)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $permission->name }}" name="permissions[]" id="permissons" {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }} />
                                <label class="form-check-label" for="permissons">{{ $permission->name }}</label>
                            </div>
                        @endforeach
                    </div>
                    
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
    </div>
</div>
@endsection