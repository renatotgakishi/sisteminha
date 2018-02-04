@extends('adminlte::page')

@section('title', 'Contas a pagar')

@section('content_header')
    <h1>Contas a pagar</h1>
@stop

@section('content')
<p> Contas por Fornecedor </p>
<div class="box ">
    <div class="box-header with-border">
      <h2>{{ $pessoas->nome }}</h2>
       
        <!--
        <a href="{{ route('balance.saque') }}" class="btn btn-danger">Sacar</a>
        <a href="{{ route('balance.transferencia') }}" class="btn btn-warning">Transferencia</a>
        <a href="{{ route('erp.historico') }}" class="btn btn-success">Extrato</a>
          -->

    </div>
    <div class="box-body">

      @include('erp.includes.alerts')
      
      <form method="POST" action="{{ route('pagar.store') }}">
        
        {!! csrf_field() !!}

        <input type="hidden" name="fornecedor_id" value="{{ $pessoas->id }}">

        <div class="form-group">
          <div class="col-sm-4">    
              <div class="form-group">   
                  <label>Documento:</label>        
                  <input type="text" name="nr_doc" placeholder="Número do Documento" class="form-control">
              </div>
          </div>

          <div class="col-sm-4"> 

             <div class="form-group">           
              <label> Emissão:</label>
              <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                <input type="date" name="data_emissao" class="form-control pull-right" id="datepicker"> 
              </div>
             </div>          
          </div>

          <div class="col-sm-4"> 
          <div class="form-group">           
              <label> Vencimento:</label>
              <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                <input type="date" name="data_vencto" class="form-control pull-right" id="datepicker"> 
              </div>
             </div>          
          </div>
        </div>

        <div class="col-sm-12 form-group">
          <label> Descricao:</label>
          <input type="text" name="descricao" placeholder="Descrição referente a conta" class="form-control">
        </div>

        <div class="form-group">
          <div class="col-sm-3 form-group">    
              <label> Valor:</label>

              <input type="number" step="0.01" name="valor" placeholder="Valor à pagar" class="form-control">
          </div>

          <div class="col-sm-3 form-group">    

          </div>
          <div class="col-sm-6 form-group">    
            
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-12">    
              <button type="submit" class="btn btn-success">Salvar</button>
          </div>
        </div>

      </form>


    </div>
</div>           
@stop