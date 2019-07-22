@extends('front.template')

@section('pageTitle', 'Listado de Usuarios')
    
@section('mainContent')

@php
    $page = isset($_GET['page']) ? $_GET['page'] : null ;
    $last = isset($_GET['page']) ? 20 * $page : 20;
    $first = isset($_GET['page']) ? $last - 19 : 1;
@endphp

<h1 class="mt-3">Usuarios Registrados: <b>{{ $countUsers }}</b></h1>
<h3>Mostrando del {{$first}} al {{$last}}</h3>

<div class="text-center">
    <form class="form-inline mb-3" action="/user/search">
        <input name="search" class="form-control mr-sm-2 @error('search') is-invalid @enderror" type="search" placeholder="Buscar usuario por mail" aria-label="Search">
        @error('search')
        <span class="invalid-tooltip">
            {{$message}}
        </span>
        @enderror
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
    </form>
</div>
    



    <ul class="list-unstyled row">
        @foreach ($allUsers as $user)
        <li class="media col-md-6 border-top border-dark p-2">
            <img class="mr-3 align-self-center" src="/storage/avatars/{{ $user->avatar }}" width="150px" alt="Imagen Usuario">
            <div class="media-body">
                <h5 class="mt-0 mb-1">{{ $user->name }} {{ $user->surname }}</h5>
                <b>ID Usuario: {{ $user->id }}</b>
                <p>{{ $user->email }}</p>
                <small class="text-muted">Registrado: {{ $user->created_at }}</small>
                <div class="form">
                        <form class="m-auto" action="/users/{{ $user->id }}" method="get">
                            <button class="btn btn-warning" type="submit"><i class="fas fa-user"></i></button>
                        </form>
                </div>
            </div>    
        </li>
        @endforeach
    </ul>        

    
    


{{ $allUsers->links() }}


@endsection