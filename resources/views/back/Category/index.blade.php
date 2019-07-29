@extends('front.template')

@section('pageTitle', 'Listado Categorías')

@section('mainContent')
    <h1 class="text-center mt-3">Listado de categorías</h1>

    <div class="text-right">
        <a class="btn btn-warning" href="/categorias/create"><i class="fas fa-plus"></i>  Crear nueva categoría</a>
    </div>

    <ul>
        @foreach ($allCategories as $category)
            <li class="mt-2">
                <i class="{{$category->icon}}"></i> 
                {{$category->name}} 
                <a class="btn btn-primary" href="/categorias/{{$category->id}}/edit">EDITAR</a>


                {{-- MODAL BOOTSTRAP PARA ELIMINAR --}}
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$category->id}}">
                        ELIMINAR
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">¡ATENCIÓN!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Estás por eliminar la categoría definitivamente.
                        <b>¿Estás Seguro?</b>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                        <form action="/categorias/{{ $category->id }}" method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger" type="submit">Eliminar</button>
                    </form>
                    </div>
                    </div>
                </div>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
    
