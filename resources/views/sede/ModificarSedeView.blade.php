@extends('layauts.PlantillaView')


@section("title", 'Modificar sede')

@section('content')

  <form id="form" action="{{route("put.modificar.sede",$sede)}}" method="POST" >
    @csrf
    @method('put')
    <h1 class="my-3">crear sede</h1>
    
    
    <div class="form-group row m-3">
        <label for="name" class="col-sm-2 col-form-label">Nombre</label>
        <div class="col-sm-10">
          <input type="text"  class="form-control" name="name" id="name" value="{{$sede->name}}">
        </div>
        @error('name')
            {{$message}}
        @enderror
    </div>
    
    <div class="form-group row m-3">
        <label for="telefono" class="col-sm-2 col-form-label">Telefono</label>
        <div class="col-sm-10">
          <input type="number"  class="form-control" name="telefono" id="telefono" value="{{$sede->telefono}}">
        </div>
        @error('telefono')
            {{$message}}
    @enderror
    </div>
    <div class="form-group m-3">
        <label for="direccion">Dirección</label>
        <textarea class="form-control" id="direccion" name="direccion" rows="3">{{$sede->direccion}}</textarea>
        @error('direccion')
            {{$message}}
        @enderror
    </div>
    
      
      
  </form>
  <div class="justify-content-between d-flex mx-3">
    <button form="form" type="submit" class="btn btn-outline-primary ">Modificar</button>
    <a href="{{route('sedes')}}"><button type="button" class="btn btn-outline-secondary">Regresar</button></a>
  </div>
  
    

</div>
@endsection