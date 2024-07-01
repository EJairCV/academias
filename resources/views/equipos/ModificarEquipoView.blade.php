@extends('layauts.PlantillaView')


@section('title', 'Equipos')

@section('content')

    <form id="form" action="{{ route('equipo.update', $equipo) }}" method="POST">
        @csrf
        @method('put')
        <h1 class="my-3">Modificar equipo</h1>


        <div class="form-group row m-3">
            <label for="name" class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="name" value="{{ $equipo->name }}">
            </div>
            @error('name')
                {{ $message }}
            @enderror
        </div>
    </form>

    <div class="justify-content-between d-flex mx-3">
        <button form="form" type="submit" class="btn btn-outline-primary ">Registrar</button>
        <a href="{{ route('equipo.index') }}"><button type="button" class="btn btn-outline-secondary">Regresar</button></a>
    </div>

    <div class="justify-content-between d-flex mt-5">

        <div class="mx-3">
            <h3>Jugadores disponibles</h3>

            <div>
                @foreach ($alumnos as $item)
                    <form class="d-flex justify-content-between my-3"
                        action="{{ route('post.asignar.equipo', ['equipo' => $equipo->id, 'usuario' => $item->id]) }}"
                        method="POST">@csrf
                        <div>
                            <span>{{ $item->name }}</span>
                        </div>
                        <div>
                            <button class="btn btn-outline-info" type="submit">Asignar al aequipo</button>
                        </div>
                    </form>
                @endforeach
            </div>


        </div>
        <div class="mx-3">
            <h3>Jugadores en el equipo</h3>
            <div>

            
                @foreach ($usuariosEquipo as $item)
                    
                        
                        <form class="d-flex justify-content-between my-3" action="{{ route('post.eliminar.del.equipo', ['equipo' => $equipo->id, 'usuario' => $item->id]) }}"
                            method="POST">
                            @csrf
                            <div>
                              <span>{{$item->name}}</span>
                            </div>
                            <div>
                              <button class="btn btn-outline-danger" type="submit">Eliminar del equipo</button>
                            </div>
                        </form>
                    
                @endforeach
              </div>
        </div>
    </div>
    </div>


@endsection
