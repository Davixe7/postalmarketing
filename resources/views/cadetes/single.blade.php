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

    <h2>Cargas laborales</h2>
    <div class="row">
      <div class="col m12">
        @if( count($cadete->workloads) )
        <table>
          <thead>
            <th>ID</th>
            <th>Fecha</th>
            <th>Status</th>
            <th>Opc.</th>
          </thead>
          <tbody>
            @foreach( $cadete->workloads as $w )
              <tr class="tr-link" target="{{ route('workloads.show', ['id'=> $w->id ]) }}" onclick="window.location = this.getAttribute('target')">
                <td>{{ $w->id }}</td>
                <td>{{ $w->date }}</td>
                <td>{{ $w->status_id }}</td>
                <td>
                  <a class="more"><span class="material-icons">more_vert</span></a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        @else
        <div class="alert alert-info">
          <span class="material-icons">info</span>
          No posee cargas laborales
        </div>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection
