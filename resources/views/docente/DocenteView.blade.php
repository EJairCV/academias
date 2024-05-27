@extends('layauts.PlantillaView')


@section("title", 'Docente')
 
@section('content')
    <h1 class="my-3">Docentes</h1>
    <a href="{{route("crear.docente")}}"><button type="button" class="mb-2 btn btn-outline-secondary">Registrar Docente</button></a>
    <div class="d-flex flex-wrap justify-content-evenly">
        @foreach ($docente as $item)
        
            <div class="card m-2 text-bg-dark align-self-stretch" style="width: 18rem;">
                <img class=" p-3 card-img-top" src="https://img.freepik.com/vector-premium/icono-perfil-usuario-estilo-plano-ilustracion-vector-avatar-miembro-sobre-fondo-aislado-concepto-negocio-signo-permiso-humano_157943-15752.jpg" alt="Card image cap">
                <div class="card-body">
                    Nombre: {{$item->name}} <br>
                     Correo: {{$item->email}} <br>
                     Cargo: {{$item->cargo}} <br>
                     Telefono {{$item->telefono}}
                  {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                </div>

                <div class="d-flex justify-content-evenly my-3">
                    <div>
                        <a href="{{route("modificar.docente", $item)}}">
                            <button type="button" class="btn btn-secondary">Modificar</button>
                        </a>
                    </div>
                    <div>
                        <form action="{{route("delete.docente", $item)}}" method="POST">
                            @csrf
                            @method("delete")
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
                

                
                
            </div>       
         @endforeach
    </div>
    {{-- {{$usuarios->links()}} --}}
    
@endsection