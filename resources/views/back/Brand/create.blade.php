@extends('front.template')

@section('pageTitle', 'Crear Marca')

@section('mainContent')
    <h1 class="mt-3 text-center">Formulario para crear marcas</h1>

    <form action="/brands" method="post">
        @csrf

        <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Nombre de la Marca</label>
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

                <div class="col-12 text-right">
                        <button type="submit" class="btn btn-success">CREAR MARCA</button>
                </div>
        </div>
    </form>
@endsection
