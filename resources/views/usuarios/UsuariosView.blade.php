@extends('layauts.PlantillaView')


@section('title', 'Alumnos')

@section('content')


    <h1 class="my-3">Alumnos</h1>

    <a href="{{ route('crear.alumno') }}"><button type="button" class=" mb-2 btn btn-outline-secondary">Registrar
            alumno</button></a>

    <div class="d-flex flex-wrap justify-content-evenly">
        @foreach ($usuarios as $item)
            <div class="card text-bg-dark m-2 align-self-stretch" style="width: 18rem;">

                <img class="card-img-top p-3"
                    src="https://img.freepik.com/vector-premium/icono-perfil-usuario-estilo-plano-ilustracion-vector-avatar-miembro-sobre-fondo-aislado-concepto-negocio-signo-permiso-humano_157943-15752.jpg"
                    alt="Card image cap">
                <div class="card-body">
                    Nombre: {{ $item->name }} <br>
                    Correo: {{ $item->email }} <br>
                    Edad: {{ $item->edad }}
                    {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
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
