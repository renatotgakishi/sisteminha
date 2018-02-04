<?php

namespace App\Http\Controllers\erp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Fornecedor;
use App\Models\Pessoa;
use App\Models\Pagar;

class PagarController extends Controller
{
    //
    public function index(){

		$pessoas =  Pessoa::has('fornecedor')->get();
		

    	Return view('erp.pagar.index',compact('pessoas'));
    }


    public function create($id){

		$pessoas =  Pessoa::has('fornecedor')->find($id);

    	Return view('erp.pagar.create',compact('pessoas'));
    }


    public function pagos($id){

		$pessoas =  Pessoa::has('fornecedor')->get();

    	Return view('erp.pagar.pagos',compact('pessoas'));
    }

    public function pagarStore(Request $request){
    	//dd($request->all());

    	$pagar = Pagar::create([         
            'fornecedor_id'	=> $request->fornecedor_id,
            'nr_doc'     	=> $request->nr_doc,
            'descricao'		=> $request->descricao,
            'data_emissao'	=> $request->data_emissao,
            'data_vencto'	=> $request->data_vencto,
            'valor'         => $request->valor,
            'id_mov_fin'    => 0
        ]);

        if ($pagar) 
             return redirect()->route('erp.contaPagar')
                             ->with('success','Lançamento efetuado com sucesso');  

        return redirect()->route('erp.contaPagar')
                             ->with('error','Não foi possivel efetuar o lançamento');


    }
}
