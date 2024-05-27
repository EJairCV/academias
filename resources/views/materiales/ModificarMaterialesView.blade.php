@extends('layauts.PlantillaView')


@section("title", 'Material')

@section('content')

  <form id="form" action="{{route("material.update",$material)}}" method="POST" >
    @method('put')
    @csrf
    <h1 class="my-3">Modificar material</h1>
    
    
    <div class="form-group row m-3">
        <label for="name" class="col-sm-2 col-form-label">Nombre</label>
        <div class="col-sm-10">
          <input type="text"  class="form-control" name="name" id="name" value="{{$material->name}}">
        </div>
        @error('name')
            {{$message}}
        @enderror
    </div>
    <div class="form-group row m-3">
        <label for="telefono" class="col-sm-2 col-form-label">Cantidad</label>
        <div class="col-sm-10">
          <input type="number"  class="form-control" name="cantidad" id="cantidad" value="{{$material->cantidad}}">
        </div>
        @error('cantidad')
            {{$message}}
    @enderror
    </div>
    
      
      
  </form>

  <div class="justify-content-between d-flex mx-3">
    <button form="form" type="submit" class="btn btn-outline-primary ">Modificar</button>
    <a href="{{route('material.index')}}"><button type="button" class="btn btn-outline-secondary">Regresar</button></a>
  </div>
</div>
  
    
@endsection