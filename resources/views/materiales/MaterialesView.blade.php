@extends('layauts.PlantillaView')


@section("title", 'Materiales')
    
@section('content')
    <h1 class="my-3">Materiales</h1>
    <a href="{{route("material.create")}}"><button type="button" class="btn mb-2 btn-outline-secondary">Registrar Materiales</button></a>
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