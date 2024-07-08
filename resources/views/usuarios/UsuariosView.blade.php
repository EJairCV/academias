@extends('layauts.PlantillaView')


@section('title', 'Alumnos')

@section('content')


    <h1 class="my-3">Alumnos</h1>

    
    <div>
        <form id="form" action="{{route('post.buscar.alumno')}}" method="post">
            @csrf
            <div class="form-group row m-3">
                <label for="name" class="col-sm-2 col-form-label">Buscar nombre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="name" value="">
                </div>
                
            </div>
            
        </form>
        <div>
            <button form="form" class="btn btn-outline-primary" type="submit">Buscar</button>
            <a href="{{route('usuarios')}}">
                <button class="btn btn-outline-primary" >limpiar</button>
            </a>
            <a href="{{ route('crear.alumno') }}">
                <button type="button" class=" btn btn-outline-secondary">
                    Registrar alumno
                </button>
            </a>
        </div>
    </div>
    <div class="d-flex flex-wrap justify-content-evenly">
        @foreach ($usuarios as $item)
            <div class="card text-bg-dark m-2 align-self-stretch" style="width: 18rem;">
                    
                <img class="card-img-top p-3"
                    src="{{secure_asset($item->fotos==null?"/images/img_2.jpg":$item->fotos->url )}}"
                    alt="Card image cap">
                <div class="card-body">
                    Nombre: {{ $item->name }} <br>
                    Correo: {{ $item->email }} <br>
                    Edad: {{ $item->edad }}
                    
                </div>
                <div class="d-flex justify-content-evenly my-3">
                    <div>
                        <a href="{{ route('modificar.alumno', $item) }}">
                            <button type="button" class="btn btn-secondary">Modificar</button>
                        </a>
                    </div>
                    <div>
                        <form action="{{ route('delete.alumno', $item) }}" method="POST">
                            @csrf
                            @method('delete')

                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                    <div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#notasModal{{ $item->id }}">
                            Notas
                        </button>
                    </div>
                </div>




            </div>

            <div class="modal fade" id="notasModal{{ $item->id }}" tabindex="-1"
                aria-labelledby="notasModalLabel{{ $item->id }}" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content bg-dark">
                        <div class="modal-header">
                            <h5 class="modal-title" id="notasModalLabel{{ $item->id }}">Modificar Notas de
                                {{ $item->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('update.notas', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="velocidad" class="form-label">Velocidad</label>
                                    <input type="number" class="form-control" id="velocidad" name="velocidad"
                                        value="{{ $item->velocidad }}">
                                </div>
                                <div class="mb-3">
                                    <label for="fuerza" class="form-label">Fuerza</label>
                                    <input type="number" class="form-control" id="fuerza" name="fuerza"
                                        value="{{ $item->fuerza }}">
                                </div>
                                <div class="mb-3">
                                    <label for="resistencia" class="form-label">Resistencia</label>
                                    <input type="number" class="form-control" id="resistencia" name="resistencia"
                                        value="{{ $item->resistencia }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{-- {{$usuarios->links()}} --}}

@endsection
