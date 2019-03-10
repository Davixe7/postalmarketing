@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col m12">
    <h1>Información personal</h1>
    <h2>{{ strtolower($client->name) }} - <span class="ml-auto d-inline-block">{{ $client->client_id }}</span></h2>
    <p style="display: flex; flex-flow: row wrap; align-items: center;"><i class="material-icons">place</i> {{ $client->address }} {{ $client->cp }}</p>
    <p>{{ $client->email }}</p>
    <p>{{ $client->tel }}</p>

    <div class="row">
      <div class="col s6">
        <!-- <div class="input-field">
          <input type="text" placeholder="Nombre" id="nombre">
          <label for="nombre">Nombre</label>
        </div>

        <div class="input-field">
          <input type="email" placeholder="Email" id="email">
          <label for="email">Email</label>
        </div> -->

        <!-- <div class="input-field">
          <input type="tel" placeholder="Teléfono" id="telefono">
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
            <th>Opc.</th>
          </thead>
          <tbody>
            @foreach( $client->products as $p )
              <tr>
                <td>{{ $p->ent_id }}</td>
                <td>{{ $p->name }}</td>
                <td>{{ $p->serie }}</td>
                <td>{{ $p->status }}</td>
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
