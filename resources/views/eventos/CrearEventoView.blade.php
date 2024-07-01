@extends('layauts.PlantillaView')


@section("title", 'Materiales')

@section('content')

  <form id="form" action="{{route("evento.store")}}" method="POST" >
    @csrf
    <h1 class="my-3">Registrar evento</h1>
    
    
    <div class="form-group row m-3">
        <label for="name" class="col-sm-2 col-form-label">Nombre</label>
        <div class="col-sm-10">
          <input type="text"  class="form-control" name="name" id="name" value="">
        </div>
        @error('name')
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
    <div class="form-group row m-3">
        <label class="col-sm-2 col-form-label" for="tipo">Tipo de evento</label>
        <div class="col-sm-10">
            
              <input type="hidden" id="id_tipo" name="tipo_id">
              <input list="listaTipos" type="text" class="form-control"  id="tipoName"
                  value=""> 
                  <datalist id="listaTipos">
                @foreach ($tipos as $item)
                
                    <option value="{{ $item->name }}" data-id="{{$item->id}}"></option>
                
                @endforeach
              </datalist>
        </div>
        
      </div>

      <div class="form-group row m-3">
        <label class="col-sm-2 col-form-label" for="fecha">Tipo de evento</label>
        <div class="col-sm-10">
            <input type="date"  class="form-control" name="fecha" id="fecha" value="">
        </div>
        
      </div>
      
      
  </form>
  <div class="justify-content-between d-flex mx-3">
    <button form="form" type="submit" class="btn btn-outline-primary ">Registrar</button>
    <a href="{{route('evento.index')}}"><button type="button" class="btn btn-outline-secondary">Regresar</button></a>
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