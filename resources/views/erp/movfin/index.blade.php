@extends('adminlte::page')

@section('title', 'Financeiro')

@section('content_header')
    <h1>Controle financeiro </h1>
@stop

@section('content')
<p> Movimento financeiro  </p>
<div class="box">
    @include('erp.includes.alerts')
    <div class="box-header with-border">
      <h3 class="box-title">Caixa e Bancos</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table class="table table-bordered table-hover" id="myTable">
        <thead>
          <tr>
            <th style="width: 10px">#</th>
            <th>Portador</th>
            <th>Saldo</th>
            
          </tr>
      </thead>>
      <tbody>
      	@forelse($portadors as $portador)
          <tr>
            <td>#</td>
            <td>                      

              <a href="{{ route('erp.extrato',$portador->id) }}" class="btn btn-danger">{{ $portador->nome }}</a>

            </td>  
            <td>{{ number_format( $portador->saldo,2,',','')  }}</td>        
            
          </tr>     
          @empty          
          @endforelse
      </tbody>
     </table>
    </div>
    <!-- /.box-body -->    
@stop


          