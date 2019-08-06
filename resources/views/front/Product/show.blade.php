@extends('front.template')
{{-- FORMATO PESOS ARGENTINOS --}}
@php setlocale(LC_MONETARY, 'es_AR.UTF-8'); @endphp
@section('pageTitle')
    Producto:  {{ $productFound->name }}
@endsection

@section('mainContent')

<br>
<main>
    <div class="container-detalle">
      <div class="row">
        <div class="container-img col-lg-6 col-md-6 col-sm-6 col-12">
            <img  class="product-cart" src="/storage/products/{{ $productFound->image }}" width="300px" style="max-width: 500px;" alt="imagen producto">
        </div>
        <div class="container-datos-producto col-lg-6 col-md-6 col-sm-6 col-12">
          <h1> {{ $productFound->name  }} </h1>
          <p>Descripción: {{ $productFound->description  }} </p>
          <h3 class="text-success">Precio: {{$productFound->price }} </h3>
          <br>
          <div class="container-cat-brand">
            <h5>Categoria: {{ $productFound->category->name  }} </h5>
            <h5>Marca: {{ $productFound->brand->name  }} </h5>
          </div>
          @if (Auth::user())
              <form action="/cart" method="post">
                  @csrf
                  <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                  <input type="hidden" name="product_id" value="{{$productFound->id}}">
                  <button class="button-oferta" type="submit">Buy NOW</button>
              </form>

            @else
              <a href="/login" class="button-oferta">Buy NOW</a>
            @endif



        </div>
        @auth


        @if (AUth::user()->admin == 1)
        <div class="container-buttons col-6">
                <div class="form-inline">
                    <form  action="/products/{{ $productFound->id }}/edit" method="get">
                        <button class="btn btn-success mr-2" type="submit">EDITAR</button>
                    </form>

                     {{-- MODAL BOOTSTRAP PARA ELIMINAR --}}
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                      ELIMINAR
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                </div>
            </div>

            @endif

            @endauth


      </div>
    </div>
  </main>





@endsection
