@extends('layauts.PlantillaView')


@section("title", 'Materiales')

@section('content')

  <form id="form" action="{{route("evento.update", $evento)}}" method="POST" >
    @csrf
    @method('put')
    <h1 class="my-3">Modificar evento</h1>
    
    
    <div class="form-group row m-3">
        <label for="name" class="col-sm-2 col-form-label">Nombre</label>
        <div class="col-sm-10">
          <input type="text"  class="form-control" name="name" id="name" value="{{$evento->name}}">
        </div>
        @error('name')
            {{$message}}
        @enderror
    </div>
    <div class="form-group m-3">
        <label for="direccion">Dirección</label>
        <textarea class="form-control" id="direccion" name="direccion" rows="3">{{$evento->direccion}}</textarea>
        @error('direccion')
            {{$message}}
        @enderror
    </div>
    <div class="form-group row m-3">
        <label class="col-sm-2 col-form-label" for="tipo">Tipo de evento</label>
        <input type="hidden" id="id_tipo" name="tipo_id">
              <input list="listaTipos" type="text" class="form-control"  id="tipoName"
                  value="{{$evento->tipo->name}}"> 
                  <datalist id="listaTipos">
                @foreach ($tipos as $item)
                
                    <option value="{{ $item->name }}" data-id="{{$item->id}}"></option>
                
                @endforeach
              </datalist>
        
      </div>

      <div class="form-group row m-3">
        <label class="col-sm-2 col-form-label" for="fecha">Tipo de evento</label>
        <div class="col-sm-10">
            <input type="date"  class="form-control" name="fecha" id="fecha" value="{{$evento->fecha}}">
        </div>
        
      </div>
      
      
  </form>
  <div class="justify-content-between d-flex mx-3">
    <button form="form" type="submit" class="btn btn-outline-primary ">Registrar</button>
    <a href="{{route('evento.index')}}"><button type="button" class="btn btn-outline-secondary">Regresar</button></a>
  </div>
  <div>
    <div class="justify-content-between d-flex mt-5">
      <div class="mx-3">
        <h3>Equipos disponibles</h3>
        @foreach ($equipos as $item)
        <form class="d-flex justify-content-between my-3"
            action="{{ route('post.asignar.evento', ['evento' => $evento->id, 'equipo' => $item->id]) }}"
            method="POST">@csrf
            <div>
                <span>{{ $item->name }}</span>
            </div>
            <div>
                <button class="btn btn-outline-info" type="submit">Asignar al envento</button>
            </div>
        </form>
    @endforeach
      </div>
      <div class="mx-3">
        <h3>Equipos registrados</h3>
        @foreach ($equiposAsignados as $item)
        <form class="d-flex justify-content-between my-3"
            action="{{ route('post.eliminar.del.evento', ['evento' => $evento->id, 'equipo' => $item->id]) }}"
            method="POST">@csrf
            <div>
                <span>{{ $item->name }}</span>
            </div>
            <div>
                <button class="btn btn-outline-danger" type="submit">Eliminar del evento</button>
            </div>
        </form>
    @endforeach
      </div>
    </div>
  </div>
</div>
<script>
  document.getElementById('tipoName').addEventListener('input', function() {
      var input = this;
      var list = document.getElementById('listaTipos').options;
      var hiddenInput = document.getElementById('id_tipo');
  
      hiddenInput.value = ''; // Limpiar el campo oculto si no hay coincidencia
      for (var i = 0; i < list.length; i++) {
          if (list[i].value === input.value) {
              hiddenInput.value = list[i].getAttribute('data-id');
              break;
          }
      }
  });
  
  </script> 
    
@endsection