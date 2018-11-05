@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col m12">
    <h1>Cadetes</h1>
    <table>
      <thead>
        <th></th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Estado.</th>
      </thead>
      <tbody>
        @foreach( $cadetes as $c )
        <tr>
          <td>{{ $c->id }}</td>
          <td>
            <a href="{{route('cadetes.show', ['id'=>$c->id])}}">{{ $c->name }}</a>
          </td>
          <td>{{ $c->email }}</td>
          <td class="status">
            <span class="material-icons">
              @if( $c->status )
                arrow_upward
              @else
                arrow_downward
              @endif
            </span>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{ $cadetes->links() }}
  </div>
</div>
@endsection
