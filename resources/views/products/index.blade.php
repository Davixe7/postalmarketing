@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col m12">
    <h1>Productos</h1>
    <table class="products-table">
      <thead>
        <th>Cod. Empresa</th>
        <th>Equipo</th>
        <th>Serie</th>
        <th>Cliente</th>
        <th>Status</th>
      </thead>
      <tbody>
        @foreach( $products as $product )
          <tr>
            <td>{{ $product->ent_id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->serie }}</td>
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
