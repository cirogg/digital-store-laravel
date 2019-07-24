@extends('front.template')

@section('pageTitle')
    Producto:  {{ $productFound->name }}
@endsection

@section('mainContent')
  <br>
<h1>Show de productos</h1>

<h2> {{ $productFound->name  }} </h2>

<img src="/storage/products/{{ $productFound->image }}" width="300px" style="max-width: 500px;" alt="imagen producto">
<br><br><br>


<h3>Precio: ${{ $productFound->price  }} </h3>

<br>

<h3>Categoria: {{ $productFound->category->name  }} </h3>

<br>

<h3>Marca: {{ $productFound->brand->name  }} </h3>

<br>

<h3>Descripción: {{ $productFound->description  }} </h3>



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




@endsection
