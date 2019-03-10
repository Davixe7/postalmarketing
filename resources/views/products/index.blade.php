@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col m12">
    <h1>Productos</h1>
    <table class="products-table">
      <thead>
        <!-- <th>Cod. Empresa</th>
        <th>Serie</th> -->
        <th>IDD</th>
        <th>CP</th>
        <th>Provincia</th>
        <th>Localidad</th>
        <th>Dirección</th>
        <th>Lat.</th>
        <th>Lng</th>
        <!-- <th>Equipo</th> -->
        <th>Cliente</th>
        <th>Status</th>
      </thead>
      <tbody>
        @foreach( $products as $product )
          <tr>
            <!-- <td>{{ $product->enterprise_id }}</td>
            <td>{{ $product->serie }}</td> -->
            <td>{{ $product->idd }}</td>
            <td>{{ $product->pc }}</td>
            <td>{{ $product->province }}</td>
            <td>{{ $product->location }}</td>
            <td class="truncate">{{ $product->address }}</td>
            <td>{{ $product->lat }}</td>
            <td>{{ $product->lng }}</td>
            <!-- <td>{{ $product->name }}</td> -->
            <td>
              @if( $product->client )
                <a href="{{ route('clients.show', ['id'=>$product->client->id]) }}">{{ $product->client->name }}</a>
              @else
                <a href="#">{{ $product->client_id }}</a>
              @endif
            </td>
            <td>{{ $product->status }}</td>
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
