@extends('adminlte::page')

@section('title', 'Saldo')

@section('content_header')
    <h1>Historicos dos lançamentos</h1>
@stop

@section('content')
<p> extrato</p>
<div class="box ">
    <div class="box-header">
      <div class="row">
        <div class="col-md-4">
          <p>Recebedor: <strong>{{ $usuario->name }}</strong></p>
          <p>Email: {{ $usuario->email }}</p>
        </div>
        <div class="col-md-4">
          
          <p>.</p>
          
        </div>

        <div class="col-md-4">
          
          <p>Saldo Atual: R$ {{ number_format( $saldo->amount,2,',','') }}</p>
          
        </div>
      </div>
                
    </div>
    <div class="box-body">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Valor</th>
            <th>Tipo</th>
            <th>Data</th>
            <th>Recebedor</th>
          </tr>
        </thead>
        <tbody>
          @forelse($historicos as $historic)
          <tr>
            <td>{{$historic->id }}</td>
            <td>{{ number_format($historic->amount,2,',','') }}</td>
                   
            <td>{{$historic->type($historic->type) }}</td>
            <td>{{$historic->date }}</td>
            <td>{{$historic->user_id_transaction }}</td>
          </tr>
          @empty
          @endforelse
        </tbody>
      </table>
    </div>


</div>           
@stop