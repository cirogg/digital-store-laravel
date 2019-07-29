@extends('front.template')

@section('pageTitle', 'Crear Categoría')

@section('mainContent')
    <h1 class="mt-3 text-center">Formulario para crear categorías</h1>

    <form action="/categorias" method="post">
        @csrf

        <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Nombre de la Categoría</label>
                        <input
                        type="text"
                        name="name"
                        value="{{$errors->has('name') ? null : old('name')}}"
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
                            value="{{$errors->has('icon') ? null : old('icon')}}"
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
                        <button type="submit" class="btn btn-success">CREAR CATEGORÍA</button>
                </div>
        </div>        
    </form>
@endsection