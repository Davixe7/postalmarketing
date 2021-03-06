@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col m12">
    <h1>Carga laboral # {{ $workload->id }}</h1>

    <h2>Recolectas</h2>
    <div class="row">
      <div class="col m12">
        <table>
          <thead>
            <th>ID</th>
            <th>Equipo</th>
            <th>Serie</th>
            <th>Confirmado</th>
            <th>Status</th>
            <th class="center-align">Opc.</th>
          </thead>
          <tbody>
            @foreach( $workload->collects as $c )
              <tr>
                <td>{{ $c->product->ent_id }}</td>
                <td>{{ $c->product->name }}</td>
                <td>{{ $c->product->serie }}</td>
                <td>{{ $c->confirmed }}</td>
                <td>{{ $c->status_id }}</td>
                <td>
                  <a href=""><span class="material-icons">forward</span></a>
                  <a href=""><span class="material-icons">check</span></a>
                  <a href=""><span class="material-icons">close</span></a>
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
