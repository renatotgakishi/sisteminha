@extends('adminlte::page')

@section('title', 'Financeiro')

@section('content_header')
    <h1>Contas a receber</h1>
@stop

@section('content')
<p> Contas a receber em aberto <strong>{{ $portador->nome }}</strong></p>

<div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title">Listagem a receber</h3>

    </div>
    <div class="box-body">

			<table class="table table-bordered table-hover">
	            <thead>
	                <tr>
	                  <th>#</th>	                  
	                  <th>Cliente</th>
	                  <th>Documento</th>
	                  <th>Descricao</th>	                  
	                  <th>Emissão</th>	 
	                  <th>Vencto</th>	 
	                  <th>Valor</th>	 
	                </tr>
	            </thead>>
	            <tbody>
	            	@forelse($recebers as $receber)
		                <tr>
	        	          <td>#</td>
	        	          
		                  <td>{{ $receber->cliente_id }} </td>
		                  <td>{{ $receber->nr_doc }}</td>
		                  <td>{{ $receber->descricao }}</td>
		                  <td>{{ $receber->data_emisao }}</td>
		                  <td>{{ $receber->data_vencto }}</td>		                  
		                  <td>{{ number_format($receber->valor,2,',','') }}</td>

		                  <td>
                                           
                      <a href="{{ route('erp.efetuaReceber',['id' => $receber->id, 'portador' => $portador->id]) }}" class="btn btn-danger">Receber</a>
		                  	
		                  </td>


		                </tr>     
	                @empty          
	                
	                @endforelse
	            </tbody>
         </table>

    </div>
</div>           
@stop