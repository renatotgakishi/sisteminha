@extends('adminlte::page')

@section('title', 'Financeiro')

@section('content_header')
    <h1>Movimento Financeiro</h1>
@stop

@section('content')
<p> Lançamentos </p>
<div class="box">
    <div class="box-header with-border">
      <h2 class="box-title">{{ $portador->nome}}</h2>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      
      @include('erp.includes.alerts')
      
      <form method="POST" action="{{ route('erp.lancFinStore') }}">
        
        {!! csrf_field() !!}

        <input type="hidden" name="portador_id" value="{{ $portador->id }}">

        <div class="form-group">
          <div class="col-sm-6">    
            <h3>
              <label class="radio-inline">
                <input type="radio" value="D" name="DC" id="radiodebito" class="form-check-input">Débito
              </label>
            </h3>       
          </div>

          <div class="col-sm-6"> 
            <h3>
              <label class="radio-inline">
                <input type="radio" name="DC" value="C" id="radiocredito" class="form-check-input">Crédito
              </label>
            </h3>           
          </div>
      </div>

        <div class="col-sm-12 form-group">
          <label>Historico</label>
          <input type="text" name="historico" placeholder="Descrição do lançamento" class="form-control">
        </div>

        <div class="col-sm-4 form-group">
          <label>Valor</label>
          <input type="number"  step="0.01"  name="valor" placeholder="Valor " class="form-control">
        </div>

        <div class="col-sm-12  form-group">
          <button type="submit" class="btn btn-success">Salvar</button>
        </div>
      </form>

    </div>
</div>    
@stop


          