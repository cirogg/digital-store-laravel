@extends('front.template')

@section('pageTitle', 'Carrito de compras - DS')

@section('mainContent')

<h1 class="text-center mt-3 mb-3">Carrito de compras</h1>

@forelse ($productsFound as $product)
    <div class="card d-inline-block product-cart" style="width: 25rem;">
        <img class="card-img-top" src="/storage/products/{{ $product->image }}" alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title">{{ $product->name }}</h5>
        <p class="card-text">{{ $product->price }}</p>
        <a href="#" class="btn btn-danger delete-cart"><i class="fas fa-times"></i></a>
        </div>
    </div>

@empty
    <div class="alert alert-warning text-center" role="alert">
            Tu carrito está vacío!
    </div> 
@endforelse

@if ($totalPrice != 0)
<div class="text-right mt-3">
        <b>Total a pagar: {{ $totalPrice }}</b>
        <button class="btn btn-success ml-2">COMPRAR</button>
</div>
@endif
    
@endsection
