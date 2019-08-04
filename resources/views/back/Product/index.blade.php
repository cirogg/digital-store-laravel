@extends('front.template')
{{-- FORMATO PESOS ARGENTINOS --}}
@php setlocale(LC_MONETARY, 'es_AR.UTF-8'); @endphp 
@section('pageTitle', 'Listado de Productos')
    
@section('mainContent')

@php
    $page = isset($_GET['page']) ? $_GET['page'] : null ;
    $last = isset($_GET['page']) ? 20 * $page : 20;
    $first = isset($_GET['page']) ? $last - 19 : 1;
@endphp

<h1 class="mt-3 mb-3 text-center">Listado de productos</h1>

<div class="text-right">
    <a class="btn btn-lg btn-warning" href="/products/create"><i class="fas fa-plus"></i>  Crear nuevo producto</a>
</div>


<h3><b>{{ $countProducts }}</b> productos en sistema</h3>

@if ($countProducts > 0)
  @if ($last < $countProducts)
  <h3>Mostrando del {{$first}} al {{$last}}</h3>
  @else
  <h3>Mostrando del {{$first}} al {{$countProducts}}</h3>
  @endif
@endif



<div class="card-columns">
@foreach ($productsFound as $productFound)

        <div class="card">
        <img class="card-img-top product-cart"src="/storage/products/{{ $productFound->image }}" alt="imagen producto">
          <div class="card-body">
            <h5> {{ $productFound->name  }} </h5>
            <p class="card-text">{{ $productFound->description }}</p>
            <p class="card-text">Precio: {{ money_format('%.2n', $productFound->price) }}</p>
            <div class="form-inline ">
                    <form class="m-auto" action="/products/{{ $productFound->id }}/edit" method="get">
                        <button class="btn btn-success" type="submit">EDITAR</button>
                    </form>

                    {{-- MODAL BOOTSTRAP PARA ELIMINAR --}}
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$productFound->id}}">
                      ELIMINAR
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{$productFound->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">¡ATENCIÓN!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            Estás por eliminar un producto definitivamente.
                            <b>¿Estás Seguro?</b>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                            <form  action="/products/{{ $productFound->id }}" method="post">
                              @csrf
                              {{ method_field('DELETE') }}
                              <button class="btn btn-danger" type="submit">Eliminar</button>
                          </form>
                          </div>
                        </div>
                      </div>
                    </div>

                    

                    <form class="m-auto" action="/products/{{ $productFound->id }}" method="get">
                        <button class="btn btn-primary" type="submit">VER MÁS</button>
                    </form>

                    @auth
                    <form action="/cart" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="product_id" value="{{$productFound->id}}">
                        <button class="button-cart btn btn-warning" type="submit"><i class="fas fa-cart-plus"></i></button>
                    </form>

                    @else
                      <a href="/login"><i class="fas fa-cart-plus button-cart btn btn-warning"></i></a>
                    @endauth
            </div>
          </div>
        </div>

@endforeach

</div>

    {{$productsFound->appends(request()->query())->links()}}

    
@endsection