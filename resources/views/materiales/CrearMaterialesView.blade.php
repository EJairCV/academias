@extends('layauts.PlantillaView')


@section("title", 'Materiales')

@section('content')

  <form id="form" action="{{route("material.store")}}" method="POST" >
    @csrf
    <h1 class="my-3">Registrar material</h1>
    
    
    <div class="form-group row m-3">
        <label for="name" class="col-sm-2 col-form-label">Nombre</label>
        <div class="col-sm-10">
          <input type="text"  class="form-control" name="name" id="name" value="">
        </div>
        @error('name')
            {{$message}}
        @enderror
    </div>
    <div class="form-group row m-3">
        <label for="telefono" class="col-sm-2 col-form-label">Cantidad</label>
        <div class="col-sm-10">
          <input type="number"  class="form-control" name="cantidad" id="cantidad" value="">
        </div>
        @error('cantidad')
            {{$message}}
    @enderror
    </div>
  
      
      
  </form>
  <div class="justify-content-between d-flex mx-3">
    <button form="form" type="submit" class="btn btn-outline-primary ">Registrar</button>
    <a href="{{route('material.index')}}"><button type="button" class="btn btn-outline-secondary">Regresar</button></a>
  </div>
</div>
  
    
@endsection