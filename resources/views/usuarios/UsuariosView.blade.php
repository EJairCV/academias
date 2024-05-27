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
                </div>




            </div>
        @endforeach
    </div>
    {{-- {{$usuarios->links()}} --}}

@endsection
