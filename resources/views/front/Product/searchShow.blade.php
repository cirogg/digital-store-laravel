@extends('front.template')

@section('pageTitle', 'Resultado Búsqueda')


@section('mainContent')
<h1 class="mt-3 mb-3">Resultado de la búsqueda de "{{ $item }}"</h1>

@if ($countItem)
<h3>Se encontraron: <b>{{ $countItem }}</b> productos</h3>

@endif
{{-- {{dd($productsFound)}} --}}


<div class="card-columns">
@forelse ($productsFound as $productFound)

        <div class="card">
        <img class="card-img-top product-cart"src="/storage/products/{{ $productFound->image }}" alt="imagen producto">
          <div class="card-body">
            <h5> {{ $productFound->name  }} </h5>
            <p class="card-text">{{ $productFound->description }}</p>
            <p class="card-text">Precio: ${{ $productFound->price  }}</p>
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
@empty

<h2>No se encontraron resultados.</h2>

@endforelse

</div>

    {{$productsFound->appends(request()->query())->links()}}




@endsection
