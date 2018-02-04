@extends('adminlte::page')

@section('title', 'Confirmação da Transferencia')

@section('content_header')
    <h1>Transferencia</h1>
@stop

@section('content')
<p>Transferencia eletronica</p>
<div class="box ">
    <div class="box-header with-border">
      <h3>Valor da Transferencia</h3>      
    </div>

    <div class="box-body">
      @include('erp.includes.alerts')

      <p>Recebedor: {{ $emailTransferencia->name }}</p>
      <p>Recebedor: {{ $emailTransferencia->email }}</p>
      <p>Saldo Atual: R$ {{ number_format( $saldo->amount,2,',','') }}</p>
      
      <form method="POST" action="{{ route('transferencia.gravar') }}">
        
        {!! csrf_field() !!}
        <input type="hidden" name="emailTransferencia" value="{{$emailTransferencia->id}}">

      	<div class="form-group">
      		<input type="text" name="valor" placeholder="Valor transferencia" class="form-control">
      	</div>
      	<div class="form-group">
      		<button type="submit" class="btn btn-success">Enviar</button>
      	</div>
      </form>
    </div>
</div>    
@stop