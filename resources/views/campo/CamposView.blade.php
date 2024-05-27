@extends('layauts.PlantillaView')


@section("title", 'Campos')
    
@section('content')
    <h1 class="my-3">Campos</h1>
    <a href="{{route("campo.create")}}"><button type="button" class="btn mb-2 btn-outline-secondary">Registrar Campo</button></a>
    <div class="d-flex flex-wrap justify-content-evenly ">
        @foreach ($campos as $item)
        
            <div class="card text-bg-dark m-2 align-self-stretch" style="width: 18rem;">
                <img class="card-img-top p-3" src="https://images.vexels.com/media/users/3/234515/isolated/preview/26730d5f6c69e624b25e67bb31565680-recorte-de-la-cancha-de-futbol.png" alt="Card image cap">
                <div class="card-body">
                    Nombre: {{$item->name}} <br>
                    Lugar: {{$item->lugar}} <br>
                    
                  
                </div>

                <div class="d-flex justify-content-evenly my-3">
                    <div>
                        <a href="{{route("campo.edit", $item)}}">
                            <button type="button" class="btn btn-secondary">Modificar</button>
                        </a>
                    </div>
                    <div>
                        <form action="{{route("campo.destroy", $item)}}" method="POST">
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