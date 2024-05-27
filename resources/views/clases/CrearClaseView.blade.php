@extends('layauts.PlantillaView')


@section('title', 'Crear clase')

@section('content')
    <div class="container">
        <form id="form" action="{{ route('clase.store') }}" method="POST">
            @csrf
            <h1>Registrar clase</h1>

    </div>
    <div class="form-group row m-3">
        <label for="name" class="col-sm-2 col-form-label">Nombre</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name" id="name" value="">
        </div>
        @error('name')
            {{ $message }}
        @enderror
    </div>



    <div class="form-group row m-3">
        <label for="telefono" class="col-sm-2 col-form-label">Docentes</label>
        <div class="col-sm-10">
          <input type="hidden" id="id_docente" name="id_docente">
            <input list="listaDocentes" type="text" class="form-control"  id="docenteName"
                value="">
            <datalist id="listaDocentes">
                @foreach ($docentes as $item)
                    <option value="{{ $item->name }}"   data-id="{{$item->id}}"></option>
                @endforeach
            </datalist>
        </div>
        @error('id_docente')
            {{ $message }}
        @enderror
    </div>


    <div class="form-group row m-3">
        <label for="telefono" class="col-sm-2 col-form-label">Campos</label>
        <div class="col-sm-10">
          <input type="hidden" id="id_campo" name="id_campo">
          <input list="listaCampos" type="text" class="form-control"  id="campoName"
                value="">
                <datalist id="listaCampos">
                @foreach ($campos as $item)
                <option value="{{ $item->name }}"   data-id="{{$item->id}}"></option>
                @endforeach
              </datalist>
        </div>
        @error('id_campo')
            {{ $message }}
        @enderror
    </div>



    </form>
    <div class="justify-content-between d-flex mx-3">
        <div>
            <button form="form" type="submit" class="btn btn-outline-primary m-2">Registrar</button>
        </div>
        <div>
            <a href="{{ route('clase.index') }}"><button type="button"
                    class="btn btn-outline-secondary">Regresar</button></a>
        </div>
    </div>
    </div>
    <script>
      document.getElementById('docenteName').addEventListener('input', function() {
          var input = this;
          var list = document.getElementById('listaDocentes').options;
          var hiddenInput = document.getElementById('id_docente');
      
          hiddenInput.value = ''; // Limpiar el campo oculto si no hay coincidencia
          for (var i = 0; i < list.length; i++) {
              if (list[i].value === input.value) {
                  hiddenInput.value = list[i].getAttribute('data-id');
                  break;
              }
          }
      });
      document.getElementById('campoName').addEventListener('input', function() {
          var input = this;
          var list = document.getElementById('listaCampos').options;
          var hiddenInput = document.getElementById('id_campo');
      
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
