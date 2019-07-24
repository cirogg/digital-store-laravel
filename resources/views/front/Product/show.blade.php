@extends('front.template')

@section('pageTitle')
    Producto:  {{ $productFound->name }}
@endsection

@section('mainContent')

<br>
<main>
    <div class="container-detalle">
      <div class="row">
        <div class="container-img col-lg-6 col-md-6 col-sm-6 col-12">
            <img src="/storage/products/{{ $productFound->image }}" width="300px" style="max-width: 500px;" alt="imagen producto">
        </div>
        <div class="container-datos-producto col-lg-6 col-md-6 col-sm-6 col-12">
          <h1> {{ $productFound->name  }} </h1>
          <p>Descripción: {{ $productFound->description  }} </p>
          <h3 class="text-success">Precio: ${{ $productFound->price  }} </h3>
          <br>
          <div class="container-cat-brand">
            <h5>Categoria: {{ $productFound->category->name  }} </h5>
            <h5>Marca: {{ $productFound->brand->name  }} </h5>
          </div>


          <button class="button-oferta" type="button" name="button">Buy NOW</button>

        </div>
        <div class="container-buttons col-6">
                <div class="form-inline">
                    <form  action="/products/{{ $productFound->id }}/edit" method="get">
                        <button class="btn btn-success mr-2" type="submit">EDITAR</button>
                    </form>

                    <form  action="/products/{{ $productFound->id }}" method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger" type="submit">ELIMINAR</button>
                    </form>
                </div>
            </div>


      </div>
    </div>
  </main>





@endsection
