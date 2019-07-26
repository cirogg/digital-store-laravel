@extends('front.template')

@section('pageTitle', 'Perfil de usuario')

@section('mainContent')

<h1 class="mt-3 mb-3">Resultado de la búsqueda de "{{ $item }}"</h1>
{{--
@if ($countItem)
<h3>Se encontraron <b>{{ $countItem }}</b> usuarios</h3>
@endif --}}
{{-- {{dd($productsFound)}} --}}


<div class="card-columns">
@forelse ($userFound as $user)

        <div class="card">
        <img class="card-img-top "src="/storage/users/{{ $user->image }}" alt="imagen usuario">
          <div class="card-body">
            <h5> {{ $user->name  }} </h5>
            <p class="card-text">{{ $user->surname }}</p>
            <p class="card-text">Mail: {{ $user->email  }}</p>
            <p class="card-text">Nickname: ${{ $user->nickname  }}</p>
            <p class="card-text">País: ${{ $user->country }}</p>
            {{-- <div class="form-inline ">
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
            </div> --}}
          </div>
        </div>
@empty

<h2>No se encontraron resultados.</h2>

@endforelse

</div>

    {{-- {{$productsFound->appends(request()->query())->links()}} --}}

@endsection
