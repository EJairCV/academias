@extends('layauts.PlantillaView')


@section("title", 'Modificar campo')

@section('content')
<div class="container">
  <form id="form" action="{{route("campo.update",$campo)}}" method="POST" >
    @csrf
    @method('put')
    <h1>Modificar campo</h1>
    
    </div>
    <div class="form-group row m-3">
        <label for="name" class="col-sm-2 col-form-label">Nombre</label>
        <div class="col-sm-10">
          <input type="text"  class="form-control" name="name" id="name" value="{{$campo->name}}">
        </div>
        @error('name')
            {{$message}}
        @enderror
    </div>

    <div class="form-group row m-3">
        <label for="name" class="col-sm-2 col-form-label">Lugar</label>
        <div class="col-sm-10">
          <input type="text"  class="form-control" name="lugar" id="lugar" value="{{$campo->lugar}}">
        </div>
        @error('lugar')
            {{$message}}
        @enderror
    </div>
    
    <div class="form-group row m-3">
        <label for="telefono" class="col-sm-2 col-form-label">Capacidad</label>
        <div class="col-sm-10">
          <input type="number"  class="form-control" name="capacidad" id="capacidad" value="{{$campo->capacidad}}">
        </div>
        @error('telefono')
            {{$message}}
    @enderror
    </div>
    
    
      
      
  </form>
  <div class="justify-content-between d-flex mx-3">
    <div>
      <button form="form" type="submit" class="btn btn-outline-primary m-2">Registrar</button>
    </div>
    <div>
      <a href="{{route('campo.index')}}"><button type="button" class="btn btn-outline-secondary">Regresar</button></a>
    </div>
  </div>
</div>
    
@endsection