@extends('layauts.PlantillaView')


@section("title", 'Tipos')
    
@section('content')
    <h1 class="my-3">Tipos de eventos</h1>
    <!-- Botón para abrir el modal -->
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createTipoModal">
        Crear Tipo
    </button>


     

<!-- Lista de equipos -->

    <div class="">
         @foreach ($teventos as $item)
        
         
            <form class="my-4" action="{{ route('tevento.update', $item) }}" method="POST">
                Nombre: {{ $item->name }}
                @csrf
                @method('PUT')

                <input type="text" name="name" value="{{ $item->name }}" class="form-control">
                <button class="btn btn-outline-danger my-3" type="submit">Actualizar</button>
            </form>
         @endforeach 
    </div>
    

    <!-- Modal -->
    <div class="modal fade bg-dark" id="createTipoModal" tabindex="-1" aria-labelledby="createTipoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="createTipoModalLabel">Crear Nuevo Tipo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('tevento.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- {{$usuarios->links()}} --}}
    
@endsection