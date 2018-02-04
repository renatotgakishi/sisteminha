@extends('adminlte::page')

@section('title', 'Contas a pagar')

@section('content_header')
    <h1>Contas a pagar</h1>
@stop

@section('content')
<p> Contas por Fornecedor </p>
<div class="box ">
    <div class="box-header with-border">
            @include('erp.includes.alerts')

      <!--
        <a href="{{ route('balance.saque') }}" class="btn btn-danger">Sacar</a>
        <a href="{{ route('balance.transferencia') }}" class="btn btn-warning">Transferencia</a>
        <a href="{{ route('erp.historico') }}" class="btn btn-success">Extrato</a>
          -->



    </div>
    <div class="box-body">

      <table class="table table-bordered table-hover" id="myTable" >
              <thead>
                  <tr>
                    
                    <th>Nome</th>
                    <th>xxx</th>
                    <th>aaa</th>
                  </tr>
              </thead>>
              <tbody>
                @forelse($pessoas as $pessoa)
                    <tr>
                      <td>
                        
                        {{ $pessoa->nome }} 
                        <br>
                            <a href="{{ route('pagar.create',$pessoa->id) }}" class="btn btn-danger btn-sm"> (+) Contas</a>

                            <a href="{{ route('pagar.pagos',$pessoa->id) }}" class="btn btn-primary btn-sm">Pagas</a>

                            <a href="{{ route('pagar.pagos',$pessoa->id) }}" class="btn btn-warning btn-sm">Em aberto</a>

                                                    
                      </td>
                      <td>{{ $pessoa->id *3}}</td>
                      <td>aaaaaaa</td>
                    </tr>  
                    
                    
                  @empty          
                  @endforelse
              </tbody>
         </table>

    </div>
</div>           
@stop