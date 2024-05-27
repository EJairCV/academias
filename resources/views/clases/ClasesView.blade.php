@extends('layauts.PlantillaView')


@section("title", 'Clases')
    
@section('content')
    <h1 class="my-3">Clases</h1>
    <a href="{{route("clase.create")}}"><button type="button" class="btn mb-2 btn-outline-secondary">Registrar clases</button></a>
    <div class="d-flex flex-wrap justify-content-evenly">
        @foreach ($clases as $item)
        
            <div class="card text-bg-dark m-2 align-self-stretch" style="width: 18rem;">
                <img class="card-img-top p-3" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRmm3VvZ5XVHPu7Wt3yxAFlEvy-h0B0qRrDMeuE0tkuUQ&s" alt="Card image cap">
                <div class="card-body">
                    Nombre: {{$item->name}} <br>
                    Profesor: {{$item->docente->name}} <br>
                    Lugar: {{$item->campo->name}}
                    
                </div>

                <div class="d-flex justify-content-evenly my-3">
                    <div>
                        <a href="{{route("clase.edit", $item)}}">
                            <button type="button" class="btn btn-secondary">Modificar</button>
                        </a>
                    </div>
                    <div>
                        <form action="{{route("clase.destroy", $item)}}" method="POST">
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