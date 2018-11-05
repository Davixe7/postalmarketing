@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col s12">
      <h1>Registrar cliente</h1>
      <form class="" action="index.html" method="post">
        <div class="input-field">
          <input type="text" name="" value="">
          <label for="">Nombre</label>
        </div>
        <div class="input-field">
          <input type="text" name="" value="">
          <label for="">Email</label>
        </div>
        <div class="input-field">
          <input type="text" name="" value="">
          <label for="">Telefono</label>
        </div>
        <div class="input-field">
          <input type="text" name="" value="">
          <label for="">Direccion</label>
        </div>
        <div class="input-field">
          <input type="text" name="" value="">
          <label for="">Direccion alternativa</label>
        </div>
        <div class="right-align">
          <button class="btn" type="submit">Enviar</button>
        </div>
      </form>
    </div>
  </div>
@endsection
