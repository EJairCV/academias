@extends('layauts.PlantillaView')


@section("title", 'Clases')
    
@section('content')
    <h1 class="my-3">Clases</h1>
    <div>
        <form id="form" action="{{route('post.buscar.clase')}}" method="post">
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
            <a href="{{route('clase.index')}}">
                <button class="btn btn-outline-primary" >limpiar</button>
            </a>
            <a href="{{ route('clase.create') }}">
                <button type="button" class=" btn btn-outline-secondary">
                    Registrar clase
                </button>
            </a>
        </div>
    </div>

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