@extends('adminlte::page')

@section('title', 'Deposito')

@section('content_header')
    <h1>Recarga</h1>
@stop

@section('content')
<p>deposito</p>
<div class="box ">
    <div class="box-header with-border">
      <h3>Recarregar</h3>      
    </div>

    <div class="box-body">
      @include('erp.includes.alerts')
      
      <form method="POST" action="{{ route('deposito.store') }}">
        
        {!! csrf_field() !!}

      	<div class="form-group">
      		<input type="text" name="valor" placeholder="Valor" class="form-control">
      	</div>
      	<div class="form-group">
      		<button type="submit" class="btn btn-success">Recarregar</button>
      	</div>
      </form>
    </div>
</div>    
@stop