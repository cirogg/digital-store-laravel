@extends('front.template')

@section('pageTitle', 'Editar Marca')

@section('mainContent')
    <h1 class="mt-3 text-center">Formulario para editar marcas</h1>

    <form class= "d-flex flex-nowrap justify-content-center" action="/brands/{{$brandFound->id}}" method="post">
        @csrf
        {{ method_field('PUT') }}

        <div class="row">
                <div class="col-12">
                    <div class="form-group text-center">
                        <label class="text-center">Nombre de la Marcas</label>
                        <input
                        type="text"
                        name="name"
                        value="{{$errors->has('name') ? null : old('name', $brandFound->name)}}"
                        class="text-center form-control @error('name') is-invalid @enderror"
                        >
                        @error('name')
                        <span class="text-danger invalid-feedback">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="col-12 d-flex justify-content-center text-right">
                        <button type="submit" class="btn btn-success">EDITAR MARCA</button>
                </div>
        </div>
    </form>
@endsection
