@extends('front.template')

@section('pageTitle', 'Listado Marcas')

@section('mainContent')
    <h1 class="text-center mt-3">Listado de marcas</h1>

    <div class="text-right">
        <a class="btn btn-warning" href="/brands/create"><i class="fas fa-plus"></i>  Crear nueva marca</a>
    </div>

    <ul>
        @foreach ($allBrands as $brand)
            <li class="mt-2">
                {{$brand->name}}
                <a class="btn btn-primary" href="/brands/{{$brand->id}}/edit">EDITAR</a>


                {{-- MODAL BOOTSTRAP PARA ELIMINAR --}}
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$brand->id}}">
                        ELIMINAR
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{$brand->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">¡ATENCIÓN!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Estás por eliminar la marca definitivamente.
                        <b>¿Estás Seguro?</b>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                        <form action="/brands/{{ $brand->id }}" method="post">
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

