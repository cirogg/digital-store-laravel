@extends('front.template')

@section('pageTitle', 'Resultado Búsqueda')


@section('mainContent')
<h1 class="mt-3 mb-3">Resultado de la búsqueda</h1>
{{-- {{dd($productsFound)}} --}}


<div class="card-columns">
@forelse ($productsFound as $productFound)
    
        <div class="card">
        <img class="card-img-top "src="/storage/products/{{ $productFound->image }}" alt="imagen producto">
          <div class="card-body">
            <h5> {{ $productFound->name  }} </h5>
            <p class="card-text">{{ $productFound->description }}</p>
            <p class="card-text">Precio: ${{ $productFound->price  }}</p>
            <div class="form-inline ">
                    <form class="m-auto" action="/products/{{ $productFound->id }}/edit" method="get">
                        <button class="btn btn-success" type="submit">EDITAR</button>
                    </form>
                    
                    <form  class="m-auto" action="/products/{{ $productFound->id }}" method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger" type="submit">ELIMINAR</button>
                    </form>

                    <form class="m-auto" action="/products/{{ $productFound->id }}" method="get">
                      <button class="btn btn-primary" type="submit">VER MÁS</button>
                  </form>
            </div>
          </div>
        </div>
@empty 

<h2>No se encontraron resultados.</h2>

@endforelse

</div> 

    {{$productsFound->appends(request()->query())->links()}}



    
@endsection