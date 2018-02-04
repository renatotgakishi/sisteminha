@extends('adminlte::page')

@section('title', 'Transferencia')

@section('content_header')
    <h1>Transferencia</h1>
@stop

@section('content')
<p>Transferencia eletronica</p>
<div class="box ">
    <div class="box-header with-border">
      <h3>Informe o email do recebedor</h3>      
    </div>

    <div class="box-body">
      @include('erp.includes.alerts')
      
      <form method="POST" action="{{ route('transferencia.store') }}">
        
        {!! csrf_field() !!}

      	<div class="form-group">
      		<input type="text" name="emailTransferencia" placeholder="Destinatario transferencia" class="form-control">
      	</div>
      	<div class="form-group">
      		<button type="submit" class="btn btn-success">Próximo</button>
      	</div>
      </form>
    </div>
</div>    
@stop