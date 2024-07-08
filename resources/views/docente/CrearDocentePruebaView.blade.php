<div>
  <form id="form" action="{{route("post.crear.docente")}}" method="POST" enctype="multipart/form-data">
    @csrf
    <h1>crear nuevo docente</h1>
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
        <label for="sueldo" class="col-sm-2 col-form-label">Sueldo</label>
        <div class="col-sm-10">
          <input type="number"  class="form-control" name="sueldo" id="sueldo" value="">
        </div>
        @error('sueldo')
            {{$message}}
    @enderror
    </div>
    <div class="form-group row m-3">
        <label class="col-sm-2 col-form-label" for="cargo">Rol</label>
        <div class="col-sm-10">
            <select class="form-control" name="cargo" id="cargo">
                <option value="Docente">Profesor</option>
                <option value="Administrador">Administrador</option>
              </select>
        </div>
        
      </div>
      <div class="form-group m-3">
        <label for="image">Seleccionar imagen:</label>
            <input class="form-control" type="file" name="image" id="image" >
            @error('image')
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
      <a href="{{route('docentes')}}"><button type="button" class="btn btn-outline-secondary">Regresar</button></a>
    </div>
  </div>
</div>