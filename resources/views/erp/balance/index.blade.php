@extends('adminlte::page')

@section('title', 'Saldo')

@section('content_header')
    <h1>Saldo</h1>
@stop

@section('content')
<p> saldo</p>
<div class="box ">
    <div class="box-header with-border">
      <a href="{{ route('balance.deposito') }}" class="btn btn-primary">Recarregar</a>
      @if ($amount > 0)
        <a href="{{ route('balance.saque') }}" class="btn btn-danger">Sacar</a>
        <a href="{{ route('balance.transferencia') }}" class="btn btn-warning">Transferencia</a>
        <a href="{{ route('erp.historico') }}" class="btn btn-success">Extrato</a>
        
      @endif

    </div>
    <div class="box-body">
      @include('erp.includes.alerts')
            
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-yellow "><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Saldo Caixa</span>
              <span class="info-box-number">R$ {{ number_format( $amount,2,',','') }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
          <!-- /.info-box -->
    </div>
    </div>
</div>           
@stop