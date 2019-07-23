@extends('front.template')

@section('pageTitle', 'Editar Producto')

@section('mainContent')
    <h2>Formulario para editar producto</h2>



    <form action="/products/{{ $productEdit->id }}" method="post" enctype="multipart/form-data">
        {{ method_field('PUT') }}
        @csrf


        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label>Nombre del producto</label>
                    <input
                    type="text"
                    name="name"
                    value="{{$errors->has('name') ? null : old('name', $productEdit->name)}}"
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
                    <label>Precio</label>
                    <input
                    type="text"
                    name="price"
                    value="{{$errors->has('price') ? null : old('price', $productEdit->price)}}"
                    class="form-control @error('price') is-invalid @enderror"
                    >
                    @error('price')
                    <span class="text-danger invalid-feedback">
                        {{$message}}
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label>Descripción</label>
                    <input
                    type="text"
                    name="description"
                    value="{{$errors->has('description') ? null : old('description', $productEdit->description)}}"
                    class="form-control @error('description') is-invalid @enderror"
                    >
                    @error('description')
                    <span class="text-danger invalid-feedback">
                        {{$message}}
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label>Categoría</label>
                    <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                            <option value="">-- Seleccionar Categoría del producto --</option>
                        @foreach ($categories as $category)
                            <option
                                @if ($productEdit->category_id == $category->id)
                                    selected
                                @endif
                                value="{{ $category->id }}">{{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('category_id'))
                        <span class="text-danger invalid-feedback">
                            {{ $errors->first('category_id') }}
                        </span>
                    @endif
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label>Marca</label>
                    <select class="form-control @error('brand_id') is-invalid @enderror" name="brand_id">
                        <option value="">-- Seleccionar Marca del producto --</option>
                        @foreach ($brands as $brand)
                            <option
                                @if ($productEdit->brand_id == $brand->id)
                                    selected
                                @endif
                                value="{{ $brand->id }}">{{ $brand->name }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('brand_id'))
                        <span class="text-danger invalid-feedback">
                            {{ $errors->first('brand_id') }}
                        </span>
                    @endif
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label>Subí una imágen</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                    @if ($errors->has('image'))
                        <span class="text-danger invalid-feedback">
                            {{ $errors->first('image') }}
                        </span>
                    @endif
                </div>
            </div>

            <div class="col-12 text-right">
                <button type="submit" class="btn btn-success">EDITAR PRODUCTO</button>
            </div>

        </div>

     </form>

@endsection
