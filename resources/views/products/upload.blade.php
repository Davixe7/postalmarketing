@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col m12">
    <h1>Importar Productos - XLS</h1>
    <form action="{{ route('products.import') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="file-field input-field">
        <div class="btn">
          <span>XLS</span>
          <input type="file" name="xls" required>
        </div>
        <div class="file-path-wrapper">
          <input class="file-path validate" type="text" placeholder="Cargar archivo">
        </div>
      </div>
      <div class="right-align">
        <button type="submit" class="btn">Enviar</button>
      </div>
    </form>
  </div>
</div>
@endsection
