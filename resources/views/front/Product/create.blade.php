@extends('front.template')

@section('pageTitle', 'Crear un producto')

@section('mainContent')

    <h2>Formulario para crear producto</h2>
    @if (count($errors))
        <ul>
            @foreach ($errors->all() as $error)
                <li class="test-danger">{{$error}}</li>
            @endforeach
        </ul>
    @endif


    <form action="/products/create" method="post" enctype="multipart/form-data">

        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label>Nombre del producto</label>
                    <input
                    type="text"
                    name="name"
                    value="{{$errors->has('name') ? null : old('name')}}"
                    class="form-control"
                    >
                    @error('name')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label>Precio</label>
                    <input
                    type="text"
                    name="price"
                    value="{{$errors->has('price') ? null : old('price')}}"
                    class="form-control"
                    >
                    @error('price')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label>Descripcion</label>
                    <input
                    type="text"
                    name="description"
                    value="{{$errors->has('description') ? null : old('description')}}"
                    class="form-control"
                    >
                    @error('description')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-6">
				<div class="form-group">
					<label>Categoría</label>
					<select class="form-control" name="category_id">
						@foreach ($categories as $category)
							<option value="{{ $category->id }}">{{ $category->name }}</option>
						@endforeach
					</select>
					@if ($errors->has('category_id'))
						<span class="text-danger">
							{{ $errors->first('category_id') }}
						</span>
					@endif
				</div>
            </div>

            <div class="col-6">
				<div class="form-group">
					<label>Marca</label>
					<select class="form-control" name="brand_id">
						@foreach ($brands as $brand)
							<option value="{{ $brand->id }}">{{ $brand->name }}</option>
						@endforeach
					</select>
					@if ($errors->has('brand_id'))
						<span class="text-danger">
							{{ $errors->first('brand_id') }}
						</span>
					@endif
				</div>
            </div>

            <div class="col-6">
				<div class="form-group">
					<label>Subí una imagen</label>
					<input type="file" name="image" class="form-control">
					@if ($errors->has('image'))
						<span class="text-danger">
							{{ $errors->first('image') }}
						</span>
					@endif
				</div>
			</div>

            <div class="col-12">
				<button type="submit" class="btn btn-success">ENVIAR</button>
			</div>

        </div>

    </form>


@endsection
