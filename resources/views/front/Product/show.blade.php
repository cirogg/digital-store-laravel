@extends('front.template')

@section('pageTitle')
    Producto:  {{ $productFound->name }}
@endsection

@section('mainContent')
<h1>Show de productos</h1>

<h2> {{ $productFound->name  }} </h2>

<h3>Precio: ${{ $productFound->price  }} </h3>

<img src="/storage/products/{{ $productFound->image }}" width="100%" style="max-width: 500px;" alt="imagen producto">

<div class="form-inline">
    <form  action="/products/{{ $productFound->id }}/edit" method="get">
        <button class="btn btn-success" type="submit">EDITAR</button>
    </form>
    
    <form  action="/products/{{ $productFound->id }}" method="post">
        @csrf
        {{ method_field('DELETE') }}
        <button class="btn btn-danger" type="submit">ELIMINAR</button>
    </form>
</div>



    
@endsection