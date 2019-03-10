@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col m12">
    <h1>Clientes</h1>
    <table>
      <thead>
        <th></th>
        <th>Nombre</th>
        <th>CP</th>
        <th>Provincia</th>
        <th>Localidad</th>
        <th>Dirección</th>
        <th>Opciones</th>
      </thead>
      <tbody>
        @foreach( $clients as $client )
          <tr>
            <td>{{ $client->id }}</td>
            <td><a href="{{ route('clients.show', ['id'=>$client->id]) }}">{{ $client->name }}</a></td>
            <td>{{ $client->pc }}</td>
            <td>{{ $client->province }}</td>
            <td>{{ $client->location }}</td>
            <td class="truncate">{{ $client->address }}</td>
            <td>
              <a class="more"><span class="material-icons">more_vert</span></a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
