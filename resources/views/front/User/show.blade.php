@extends('front.template')

@section('pageTitle', 'Perfil de usuario')


@section('mainContent')

@if ($item != null)
    
<h1 class="mt-3 mb-3">Resultado de la búsqueda de "{{ $item }}"</h1>
@endif

<div class="card-columns">


            <div class="card pt-3">
            <img class="card-img-top" src="/storage/avatars/{{ $userFound->avatar }}" alt="imagen usuario">
              <div class="card-body">
                <h5> <b>{{$userFound->name}} </b> <b> {{ $userFound->surname }} </b></h5>
                <p class="card-text"><b>Mail:</b> {{ $userFound->email  }}</p>
                <p class="card-text"><b>Nickname:</b> {{ $userFound->nickname }}</p>
                <p class="card-text"><b>País:</b> {{ $userFound->country }}</p>
                <p class="card-text"><b>Provincia:</b> {{ $userFound->city }}</p>
              </div>
              <a class="btn btn-primary d-flex justify-content-center " href="/users/edit/{{$userFound->id}}">EDITAR PERFIL</a>
            </div>


    </div>
@endsection
