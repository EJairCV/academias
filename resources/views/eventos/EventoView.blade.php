@extends('layauts.PlantillaView')


@section("title", 'Evento')
    
@section('content')
    <h1 class="my-3">Evento</h1>
    

     <div>
        <form id="form" action="{{route('post.buscar.evento')}}" method="post">
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
            <a href="{{route('evento.index')}}">
                <button class="btn btn-outline-primary" >limpiar</button>
            </a>
            <a href="{{ route('evento.create') }}">
                <button type="button" class=" btn btn-outline-secondary">
                    Registrar evento
                </button>
            </a>
        </div>
    </div> 



    <div class="d-flex flex-wrap justify-content-evenly">
        @foreach ($eventos as $item)
        
            <div class="card text-bg-dark m-2 align-self-stretch" style="width: 18rem;">
                <img class="card-img-top p-3" src="https://w7.pngwing.com/pngs/347/1021/png-transparent-american-football-computer-icons-sport-football-white-sport-logo.png" alt="Card image cap">
                <div class="card-body">
                    Nombre: {{$item->name}} <br>
                    Direccion: {{$item->direccion}} <br>
                    Fecha: {{$item->fecha}} <br>
                    Tipo: {{$item->tipo==null?'' : $item->tipo->name}}
                </div>

                <div class="d-flex justify-content-evenly my-3">
                    <div>
                        <a href="{{route("evento.edit", $item)}}">
                            <button type="button" class="btn btn-secondary">Modificar</button>
                        </a>
                    </div>
                    <div>
                        <form action="{{route("evento.destroy", $item)}}" method="POST">
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