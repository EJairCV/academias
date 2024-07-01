@extends('layauts.PlantillaView')


@section("title", 'Registrar alumnos')

@section('content')
    
<div class="container">
  <form id="form" action="{{route("post.crear.alumno")}}" method="POST" >
    @csrf 
    <h1>crear nuevo alumno</h1>
    <div class="form-group row m-3">
      <label for="email" class="col-sm-2 col-form-label">Correo</label>
      <div class="col-sm-10">
        <input type="text"  class="form-control" name="email" id="email" placeholder="email@example.com">
      </div>
      @error('email')
            {{$message}}
    @enderror
    </div>
    <div class="form-group row m-3">
      <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
      </div>
      @error('password')
            {{$message}}
    @enderror
    </div>
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
        <label for="telefono" class="col-sm-2 col-form-label">Telefono</label>
        <div class="col-sm-10">
          <input type="number"  class="form-control" name="telefono" id="telefono" value="">
        </div>
        @error('telefono')
            {{$message}}
    @enderror
    </div>
    <div class="form-group row m-3">
        <label for="dni" class="col-sm-2 col-form-label">DNI</label>
        <div class="col-sm-10">
          <input type="number"  class="form-control" name="dni" id="dni" value="">
        </div>
        @error('dni')
            {{$message}}
    @enderror
    </div>
    <div class="form-group row m-3">
        <label for="edad" class="col-sm-2 col-form-label">Edad</label>
        <div class="col-sm-10">
          <input type="number"  class="form-control" name="edad" id="edad" value="">
        </div>
        @error('edad')
            {{$message}}
    @enderror
    </div>
    <div class="form-group m-3">
        <label for="direccion">Dirección</label>
        <textarea class="form-control" id="direccion" name="direccion" rows="3"></textarea>
        @error('direccion')
            {{$message}}
        @enderror
    </div>
      
      
  </form>
  <div class="justify-content-between d-flex mx-3">
    <div>
      <button form="form" type="submit" class="btn btn-outline-primary m-2">Registrar</button>
    </div>
    <div>
      <a href="{{route('usuarios')}}"><button type="button" class="btn btn-outline-secondary">Regresar</button></a>
    </div>
  </div>
</div>
@endsection