@extends('layauts.PlantillaView')


@section('title', 'Alumnos')

@section('content')
    <h1 class="my-3">Bienvenido {{ $datosUsuarios->name }}</h1>
    <div class="d-flex flex-wrap justify-content-evenly">
        <div class="mt-5">
            <h3 class="">Estadisticas: </h3>
            <h5 class="mt-4">Velocidad: {{ $datosUsuarios->velocidad }}</h5>
            <h5>Fuerza: {{ $datosUsuarios->fuerza }}</h5>
            <h5>Resistencia: {{ $datosUsuarios->resistencia }}</h5>
        </div>
        <div class="card text-bg-dark m-2 align-self-stretch" style="width: 18rem;">

            <img class="card-img-top p-3"
                src="https://img.freepik.com/vector-premium/icono-perfil-usuario-estilo-plano-ilustracion-vector-avatar-miembro-sobre-fondo-aislado-concepto-negocio-signo-permiso-humano_157943-15752.jpg"
                alt="Card image cap">
            <div class="card-body">
                <p class="card-text">{{ $datosUsuarios->name }}</p>
            </div>
        </div>
    </div>


    <h2 class="mt-4 mb-3">Equipos</h2>
    <div class="accordion" id="accordionExample">
        @foreach ($equipos as $item)
            <div class="accordion-item bg-dark">
                <h2 class="accordion-header">
                    <button class="accordion-button bg-dark text-light" type="button" data-bs-toggle="collapse"
                        data-bs-target="{{ '#' . $item->id }}" aria-expanded="false" aria-controls="collapseOne">

                        {{ $item->name }}
                    </button>
                </h2>
                <div id="{{ $item->id }}" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <h5>Miembros</h5>
                        <ul class="text-light">
                            @foreach ($item->alumnos()->get() as $alumno)
                                <li>
                                    {{ $alumno->name }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    <div class="">

        <h2 class="mt-4 mb-3">Eventos</h2>
        <div class="accordion mb-5" id="accordionExample">
            @foreach ($eventos as $item)
                {{-- <li>
                    <h5>{{ $item->name }}</h5>
                    <span>Dirección: {{ $item->direccion }}</span>
                    <br>
                    <span>Fecha: {{ $item->fecha }}</span>
                    <br>
                    <span>Tipo: {{ $item->tipo->name }}</span>
                </li> --}}
                <div class="accordion-item bg-dark">
                  <h2 class="accordion-header">
                      <button class="accordion-button bg-dark text-light" type="button" data-bs-toggle="collapse"
                          data-bs-target="{{ '#'.$item->id.'11' }}" aria-expanded="false" aria-controls="collapseOne">
  
                          {{ $item->name }}
                      </button>
                  </h2>
                  <div id="{{ $item->id.'11' }}" class="accordion-collapse collapse " data-bs-parent="#accordionExample2">
                      <div class="accordion-body">
                          <h5>Información</h5>
                          <ul class="text-light">
                             <li>Dirección: {{$item->direccion}}</li>
                             <li>Fecha: {{$item->fecha}}</li>
                             <li>Tipo de evento: {{$item->tipo->name}}</li>
                          </ul>
                      </div>
                  </div>
            @endforeach
          </div>
    </div>


@endsection
