@extends('front.template')

@section('pageTitle', 'Editar Categoría')

@section('mainContent')
    <h1 class="mt-3 text-center">Formulario para editar categorías</h1>

    <form action="/categorias/{{$categoryFound->id}}" method="post">
        @csrf
        {{ method_field('PUT') }}

        <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Nombre de la Categoría</label>
                        <input
                        type="text"
                        name="name"
                        value="{{$errors->has('name') ? null : old('name', $categoryFound->name)}}"
                        class="form-control @error('name') is-invalid @enderror"
                        >
                        @error('name')
                        <span class="text-danger invalid-feedback">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Icono</label>
                            <input
                            type="text"
                            name="icon"
                            value="{{$errors->has('icon') ? null : old('icon', $categoryFound->icon)}}"
                            class="form-control @error('icon') is-invalid @enderror"
                            >
                            <small>Elegir el ícono de <a target="_blank" class="badge badge-dark" href="https://fontawesome.com">Font Awsome</a></small>
                            @error('icon')
                            <span class="text-danger invalid-feedback">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                </div>

                <div class="col-12 text-right">
                        <button type="submit" class="btn btn-success">EDITAR CATEGORÍA</button>
                </div>
        </div>        
    </form>
@endsection