@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col m12">
    <h1>Información personal</h1>
    <h2>John Doe</h2>

    <div class="row">
      <div class="col s6">
        <div class="input-field">
          <input type="text" placeholder="Nombre" id="nombre">
          <label for="nombre">Nombre</label>
        </div>
      </div>
      <div class="col s6">
        <div class="input-field">
          <input type="email" placeholder="Email" id="email">
          <label for="email">Email</label>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col s6">
        <div class="input-field">
          <input type="tel" placeholder="Teléfono" id="telefono">
          <label for="telefono">Telefono</label>
        </div>
      </div>
    </div>

    <h2>Seguridad</h2>
    <div class="row">
      <div class="input-field col s6">
        <input type="password" name="current-pass" value="">
        <label for="">Contraseña actual</label>
      </div>
      <div class="input-field col s6">
        <input type="password" name="new-pass" value="">
        <label for="">Contraseña nueva</label>
      </div>
      <div class="input-field col s6">
        <input type="password" name="confirm-pass" value="">
        <label for="">Confirmar contraseña</label>
      </div>
    </div>

    <h2>Carga Laboral</h2>
    <div class="row">
      <div class="col m12">
        <table>
          <thead>
            <th>URL Mapa</th>
            <th>Fecha</th>
            <th>Cant. tareas</th>
            <th>Status</th>
            <th>Opc.</th>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
