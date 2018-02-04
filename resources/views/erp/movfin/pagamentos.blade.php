@extends('adminlte::page')

@section('title', 'Financeiro')

@section('content_header')
    <h1>Contas a pagar</h1>
@stop

@section('content')
<p> Contas a pagar em aberto <strong>{{ $portador->nome }}</strong></p>

<div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Listagem a pagar</h3>

    </div>
    <div class="box-body">

			<table class="table table-bordered table-hover" id="myTable">
	            <thead>
	                <tr>
	                  <th>#</th>	                  
	                  <th>fornecedor</th>
	                  <th>Documento</th>
	                  <th>Descricao</th>	                  
	                  <th>Emissão</th>	 
	                  <th>Vencto</th>	 
	                  <th>Valor</th>	 
	                </tr>
	            </thead>>
	            <tbody>
	            	@forelse($pagars as $pagar)
		                <tr>
	        	          <td>#</td>
	        	          
		                  <td>{{ $pagar->fornecedor_id }} </td>
		                  <td>{{ $pagar->nr_doc }}</td>
		                  <td>{{ $pagar->descricao }}</td>
		                  <td>{{ $pagar->data_emisao }}</td>
		                  <td>{{ $pagar->data_vencto }}</td>
		                  <td>{{ number_format($pagar->valor,2,',','') }}</td>
 
		                  <td>
                                           
                      <a href="{{ route('erp.efetuaPagar',['id' => $pagar->id, 'portador' => $portador->id]) }}" class="btn btn-danger">Pagar</a>
		                  	
		                  </td>


		                </tr>     
	                @empty          
	                
	                @endforelse
	            </tbody>
         </table>

    </div>
</div>           
@stop