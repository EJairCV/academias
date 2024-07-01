@extends('layauts.PlantillaView')


@section("title", 'Materiales')
    
@section('content')
    <h1 class="my-3">Materiales</h1>
    

    <div>
        <form id="form" action="{{route('post.buscar.material')}}" method="post">
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
            <a href="{{route('material.index')}}">
                <button class="btn btn-outline-primary" >limpiar</button>
            </a>
            <a href="{{ route('material.create') }}">
                <button type="button" class=" btn btn-outline-secondary">
                    Registrar material
                </button>
            </a>
        </div>
    </div>



    <div class="d-flex flex-wrap justify-content-evenly">
        @foreach ($material as $item)
        
            <div class="card text-bg-dark m-2 align-self-stretch" style="width: 18rem;">
                <img class="card-img-top p-3" src="https://images.vexels.com/media/users/3/146850/isolated/preview/b314541f49ce483dd4c47d0142a47f77-icono-de-pelota-de-ftbol-cl-sico.png" alt="Card image cap">
                <div class="card-body">
                    Nombre: {{$item->name}} <br>
                    Cantidad: {{$item->cantidad}} <br>
                     
                  
                </div>

                <div class="d-flex justify-content-evenly my-3">
                    <div>
                        <a href="{{route("material.edit", $item)}}">
                            <button type="button" class="btn btn-secondary">Modificar</button>
                        </a>
                    </div>
                    <div>
                        <form action="{{route("material.destroy", $item)}}" method="POST">
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