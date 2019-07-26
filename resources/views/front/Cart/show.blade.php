@extends('front.template')

@section('pageTitle', 'Carrito de compras - DS')

@section('mainContent')

<h1 class="text-center mt-3 mb-3">Carrito de compras</h1>

@forelse ($productsFound as $product)
    
    @if ($product->is_paid == 0)
        
    <div class="card d-inline-block product-cart mt-2 mr-2 justify-content-between">
        <img class="card-img-top" src="/storage/products/{{ $product->image }}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">{{ $product->price }}</p>
            <form action="/cart/{{ Auth::user()->id }}/{{$product->id}}" method="post">
                @csrf
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger button-cart"><i class="fas fa-times"></i></button>
            </form>
        </div>
    </div>
    
    @endif

    
@empty
    <div class="alert alert-warning text-center" role="alert">
            Tu carrito está vacío!
    </div> 
@endforelse



@if ($totalPrice != 0)
<div class="text-right mt-3">
        <b>Total a pagar: {{ $totalPrice }}</b>
        <button class="btn btn-lg btn-success ml-2">COMPRAR</button>
</div>
@endif
    
@endsection
