@extends('adminlte::page')

@section('title', 'Saque')

@section('content_header')
    <h1>Saque</h1>
@stop

@section('content')
<p>Retirada de valores</p>
<div class="box ">
    <div class="box-header with-border">
      <h3>Retirar</h3>      
    </div>

    <div class="box-body">
      @include('erp.includes.alerts')
      
      <form method="POST" action="{{ route('saque.store') }}">
        
        {!! csrf_field() !!}

      	<div class="form-group">
      		<input type="text" name="valor" placeholder="Valor retirada" class="form-control">
      	</div>
      	<div class="form-group">
      		<button type="submit" class="btn btn-success">Sacar</button>
      	</div>
      </form>
    </div>
</div>    
@stop