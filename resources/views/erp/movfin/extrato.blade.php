@extends('adminlte::page')

@section('title', 'Financeiro')

@section('content_header')
    <h1>Financeiro</h1>
@stop

@section('content')

<p> Movimento financeiro extrato <strong>{{ $nomeportador->nome}}</strong></p>

<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Extrato</h3>
      <a href="{{ route('erp.contasPagar', $nomeportador->id) }}" class="btn btn-danger">Pagar</a>
      <a href="{{ route('erp.contasReceber', $nomeportador->id) }}" class="btn btn-warning">Receber</a>
      <a href="{{ route('erp.lancFin', $nomeportador->id) }}" class="btn btn-success">Lançamento</a>
        
    </div>
    
    <div class="box-body">

			<table class="table table-bordered table-hover" id="myTable" >
	            <thead>
	                <tr>
	                  <th>#</th>	                  
	                  <th>Historico</th>
	                  <th>Valor</th>
	                  <th>DC</th>	                  
	                  <th>Data</th>	 
	                </tr>
	            </thead>>
	            <tbody>
	            	@forelse($movfins as $movfin)
		                <tr>
		                  <td>#</td>
		                  <td>{{ $movfin->historico }} </td>
		                  <td>{{ number_format( $movfin->valor,2,',','')  }}</td>
		                  <td>{{ $movfin->DC }}</td>
		                  <td>{{ $movfin->data }}</td>
		                  
		                </tr>     
	                @empty          
	                @endforelse
	            </tbody>
         </table>

    </div>
    
  
</div>           


@stop


@section('script')


@stop

