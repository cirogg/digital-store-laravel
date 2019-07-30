@extends('front.template')

@section('pageTitle', 'Panel de Control')

@section('mainContent')
    <h1 class="text-center mt-3">Panel de Control</h1>
    <h3 class="text-center">Desde acá vas a poder administar el sistema web</h3>

    <div class="text-center d-flex flex-column align-items-center">
        <a class="btn btn-lg mt-4 btn-success col-12 col-md-3" href="/products">PRODUCTOS</i></a>
        <a class="btn btn-lg mt-4 btn-warning col-12 col-md-3" href="/users">USUARIOS</i></a>
        <a class="btn btn-lg mt-4 btn-danger col-12 col-md-3" href="/categorias">CATEGORÍAS</i></a>
        <a class="btn btn-lg mt-4 btn-primary col-12 col-md-3" href="/brands">MARCAS</i></a>
    </div>

 @include('front.footer-admin')
@endsection
