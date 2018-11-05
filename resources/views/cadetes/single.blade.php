@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col m12">
    <h1>Información del Cadete</h1>
    <h2>{{ $cadete->name }}</h2>

    <div class="row">
      <div class="col s6">
        <div class="input-field">
          <input type="text" placeholder="Nombre" id="nombre" value="{{ $cadete->name }}">
          <label for="nombre">Nombre</label>
        </div>

        <div class="input-field">
          <input type="email" placeholder="Email" id="email" value="{{ $cadete->email }}">
          <label for="email">Email</label>
        </div>

        <!-- <div class="input-field">
          <input type="tel" placeholder="Teléfono" id="telefono" value="{{ $cadete->name }}">
          <label for="telefono">Telefono</label>
        </div> -->
      </div>
    </div>

    <h2>Productos</h2>
    <div class="row">
      <div class="col m12">
        <table>
          <thead>
            <th>Cod. Empresa</th>
            <th>Equipo</th>
            <th>Serie</th>
            <th>Status</th>
            <td>CP</td>
            <th>Opc.</th>
          </thead>
          <tbody>
            @foreach( $cadete->products as $p )
              <tr>
                <td>{{ $p->ent_id }}</td>
                <td>{{ $p->name }}</td>
                <td>{{ $p->serie }}</td>
                <td>{{ $p->status }}</td>
                <td>{{ $p->client->cp }}</td>
                <td>
                  <a class="more"><span class="material-icons">more_vert</span></a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
