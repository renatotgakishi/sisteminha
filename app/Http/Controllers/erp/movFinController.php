<?php

namespace App\Http\Controllers\erp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Portador;
use App\Models\MovFin;
use App\Models\Pagar;
use App\Models\Receber;



class movFinController extends Controller
{
    public function index()
    {
    	$portadors = Portador::all();
        //dd($portadors);

    	return view('erp.movfin.index',compact('portadors'));
    }


    public function extrato($id)
    {
        $nomeportador = Portador::find($id);        

        $movfins = MovFin::where('portador_id', $id)->get();
                
        
        return view('erp.movfin.extrato',compact('movfins','nomeportador'));
    }    

    public function contasPagar($id){
        $pagars =  Pagar::where('id_mov_fin',0)->get();
        $portador = Portador::find($id);

        //dd($pagar);
        return view('erp.movfin.pagamentos',compact('pagars','portador'));
    }

    public function efetuaPagar($idpagar, $idportador){

        $pagar =  Pagar::where('id', $idpagar)->get()->first();
        //dd($pagar);

        $historico =  'Pagto ' . $pagar->descricao;
        $valor = $pagar->valor;
            
        DB::BeginTransaction();

        $movfin = MovFin::create([
            'portador_id'   => $idportador,
            'historico'     => $historico,
            'valor'         => $valor,
            'dc'            => 'D'
        ]);

        $pagar->id_mov_fin = $movfin->id;
        $pagto = $pagar->save();

        $portador = Portador::find($idportador);
        $portador->saldo -= $valor ;
        $saldo = $portador->save();


        if ($movfin && $pagto && $saldo) {

            DB::commit();

            return redirect()->route('erp.contasPagar', $idportador)
                             ->with('success','Pagamento efetuado com sucesso');        
        } 
        else
        {
            DB::rollback();
            return redirect()->route('erp.contasPagar', $idportador)
                             ->with('error','Não foi possivel efetuar o pagamento');
            
        }  

    }

    public function contasReceber($id){
        $recebers =  Receber::where('id_mov_fin',0)->get();
        $portador = Portador::find($id);

        //dd($pagar);
        return view('erp.movfin.recebimentos',compact('recebers','portador'));
    }

    public function efetuaReceber($idreceber, $idportador){

        $receber =  Receber::where('id', $idreceber)->get()->first();

        $historico = 'Recebimento ' . $receber->descricao;
        $valor = $receber->valor;
    
        DB::BeginTransaction();

        $movfin = MovFin::create([
            'portador_id'   => $idportador,
            'historico'     => $historico,
            'valor'         => $valor,
            'dc'            => 'C'
        ]);

        $receber->id_mov_fin = $movfin->id;
        $recbto = $receber->save();        

        $portador = Portador::find($idportador);
        $portador->saldo += $valor ;
        $saldo = $portador->save();


        if ($movfin && $recbto && $saldo) {

            DB::commit();

            return redirect()->route('erp.contasReceber', $idportador)
                             ->with('success','Recebimento efetuado com sucesso');        
        } 
        else
        {
            DB::rollback();
            return redirect()->route('erp.contasReceber', $idportador)
                             ->with('error','Não foi possivel efetuar o recebimento');
        }  
    }


    public function lancFin($id){
        $portador = Portador::find($id);        

        return view('erp.movfin.lanFin',compact('portador'));

    }
    public function lancFinStore(Request $request){
        
        $movfin = MovFin::create([
            'portador_id'   => $request->portador_id,
            'historico'     => $request->historico,
            'valor'         => $request->valor,
            'dc'            => $request->DC
        ]);


        $portador = Portador::find($request->portador_id);
        if ($request->DC === 'D'){
            $portador->saldo -= $request->valor;
        }
        else
        {
            $portador->saldo += $request->valor ;
        }
        $saldo = $portador->save();


        if ($movfin && $saldo) 
             return redirect()->route('erp.movfin', $request->portador_id)
                             ->with('success','Lançamento efetuado com sucesso');  

        return redirect()->route('erp.lancFin', $request->portador_id)
                             ->with('error','Não foi possivel efetuar o lançamento');
        
    }
}
