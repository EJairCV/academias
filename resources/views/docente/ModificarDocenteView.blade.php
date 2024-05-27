@extends('layauts.PlantillaView')


@section("title", 'Modificar docente')

@section('content')
<div class="container">
  <form id="form" action="{{route("put.modificar.docente",$docente)}}" method="POST" >
    @csrf
    @method('put')
    <h1>Modificar docente docente</h1>
    <div class="form-group row m-3">
      <label for="email" class="col-sm-2 col-form-label">Correo</label>
      <div class="col-sm-10">
        <input type="text" value="{{$docente->email}}"  class="form-control" name="email" id="email" placeholder="email@example.com">
      </div>
      @error('email')
            {{$message}}
    @enderror
    </div>
    <div class="form-group row m-3">
      <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
      <div class="col-sm-10">
        <input type="password" value="{{$docente->password}}" class="form-control" name="password" id="password" placeholder="Password">
      </div>
      @error('password')
            {{$message}}
    @enderror
    </div>
    <div class="form-group row m-3">
        <label for="name" class="col-sm-2 col-form-label">Nombre</label>
        <div class="col-sm-10">
          <input type="text"  class="form-control" name="name" id="name" value="{{$docente->name}}">
        </div>
        @error('name')
            {{$message}}
        @enderror
    </div>
    <div class="form-group row m-3">
        <label for="telefono" class="col-sm-2 col-form-label">Telefono</label>
        <div class="col-sm-10">
          <input type="number"  class="form-control" name="telefono" id="telefono" value="{{$docente->telefono}}">
        </div>
        @error('telefono')
            {{$message}}
    @enderror
    </div>
    <div class="form-group row m-3">
        <label for="dni" class="col-sm-2 col-form-label">DNI</label>
        <div class="col-sm-10">
          <input type="number"  class="form-control" name="dni" id="dni" value="{{$docente->dni}}">
        </div>
        @error('dni')
            {{$message}}
    @enderror
    </div>
    <div class="form-group row m-3">
        <label for="sueldo" class="col-sm-2 col-form-label">Sueldo</label>
        <div class="col-sm-10">
          <input type="number"  class="form-control" name="sueldo" id="sueldo" value="{{$docente->sueldo}}">
        </div>
        @error('sueldo')
            {{$message}}
    @enderror
    </div>
    <div class="form-group row m-3">
        <label class="col-sm-2 col-form-label" for="cargo">Rol</label>
        <div class="col-sm-10">
            <select class="form-control" name="cargo" id="cargo">
                <option value="profesor">Profesor</option>
                <option value="administrador">Administrador</option>
              </select>
        </div>
        
      </div>
    <div class="form-group m-3">
        <label for="direccion">Dirección</label>
        <textarea class="form-control" id="direccion" name="direccion" rows="3">{{$docente->direccion}}</textarea>
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
      <a href="{{route('docentes')}}"><button type="button" class="btn btn-outline-secondary">Regresar</button></a>
    </div>
  </div>
</div>
    
@endsection