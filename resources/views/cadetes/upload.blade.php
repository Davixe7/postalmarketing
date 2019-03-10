@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col m12">
    <h1>Importar Cadetes - XLS</h1>
    <form action="{{ route('cadetes.import') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="col m8">
        <div class="file-field input-field row">
          <input type="file" name="xls" required>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text" placeholder="Cargar archivo">
          </div>
        </div>
      </div>
      <div class="col m4">
        <button type="submit" class="flat">Enviar</button>
      </div>
    </form>
  </div>
  @if( $errors )
    <div class="errors col">
      <h2>Importación finalizada con éxito</h2>
      {{ dd( $errors ) }}
    </div>
  @endif
</div>
@endsection
