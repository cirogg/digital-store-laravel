@extends('front.template')

@section('pageTitle', 'Perfil de usuario')

@section('mainContent')
<div class="card-columns">


            <div class="card">
            <img class="card-img-top "src="/storage/avatars/{{ $userFound->avatar }}" alt="imagen usuario">
              <div class="card-body">
                <h5> {{ $userFound->name}} {{ $userFound->surname }}</h5>
                <p class="card-text">Mail: {{ $userFound->email  }}</p>
                <p class="card-text">Nickname: {{ $userFound->nickname  }}</p>
                <p class="card-text">País: {{ $userFound->country }}</p>
              </div>
            </div>


    </div>
@endsection
