@extends('layauts.PlantillaView')


@section("title", 'Sedes')
    
@section('content')
    <h1 class="my-3">Sedes</h1>
    <a href="{{route("crear.sede")}}"><button type="button" class="mb-2 btn btn-outline-secondary">Registrar sede</button></a>
    <div class="d-flex flex-wrap justify-content-evenly ">
        @foreach ($sedes as $item)
        
            <div class="card m-2 text-bg-dark align-self-stretch" style="width: 18rem;">
                <img class="p-3 card-img-top" src="https://cdn-icons-png.flaticon.com/512/6712/6712182.png" alt="Card image cap">
                <div class="card-body">
                    Nombre: {{$item->name}} <br>
                    Dirección: {{$item->direccion}} <br>
                    Telefono: {{$item->telefono}}
                  
                </div>

                <div class="justify-content-evenly d-flex my-3">
                    <div>
                        <a href="{{route("modificar.sede", $item)}}">
                            <button type="button" class="btn btn-secondary">Modificar</button>
                        </a>
                    </div>
                    <div>
                        <form action="{{route("delete.sede", $item)}}" method="POST">
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