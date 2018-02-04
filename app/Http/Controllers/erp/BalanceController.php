<?php

namespace App\Http\Controllers\erp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Http\Requests\MoneyValidationFormRequest;
use App\User;

class BalanceController extends Controller
{
	public function index(){
		//dd(auth()->user()->balance()->get());
		$balance = auth()->user()->balance;
		$amount = $balance ? $balance->amount : 0;

		return view('erp.balance.index', compact('amount'));	
	}

	public function deposito(){
		return view('erp.balance.deposito');
	}
    
    public function depositoStore(MoneyValidationFormRequest $request)
    {
    	$balance = auth()->user()->balance()->firstOrCreate([]);
    	$response = $balance->deposito($request->valor);

    	if ($response['success']) 
    		return redirect()->route('erp.balance')
    						 ->with('success',$response['message']);

    	return redirect()->back()->with('error',$response['message']);

    	
    }
    public function saque()
    {
        return view('erp.balance.saque');
    }

    public function saqueStore(MoneyValidationFormRequest $request)
    {
        
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->saque($request->valor);

        if ($response['success']) 
            return redirect()->route('erp.balance')
                             ->with('success',$response['message']);

        return redirect()->back()->with('error',$response['message']);      
    }

    public function transferencia(){
        return view('erp.balance.transferencia');
    }

    public function transferenciaStore(Request $request, User $user)
    {
        if (!$emailTransferencia = $user->getEmailTransferencia($request->emailTransferencia))
            return redirect()
                    ->back()
                    ->with('error','não encontrado!');

        if ($emailTransferencia->id ===auth()->user()->id)
            return redirect()
                    ->back()
                    ->with('error','Não pode transferir para voce mesmo');

        $saldo = auth()->user()->balance;

        return view('erp.balance.transfFinal', compact('emailTransferencia','saldo') );
        
    }

    public function transferenciaGravar(MoneyValidationFormRequest $request, User $user)
    {
        //dd($request->all());

        if (!$emailTransferencia = $user->find($request->emailTransferencia))
            return redirect()
                    ->route('balance.transferencia')
                    ->with('error','Não encontrou (estranho)');



        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->transfere($request->valor, $emailTransferencia);


        if ($response['success']) 
            return redirect()->route('erp.balance')
                             ->with('success',$response['message']);

        return redirect()->back()->with('error',$response['message']);     
    }

    public function historico(){
        $historicos = auth()->user()->historics()->get();
        $usuario    = auth()->user()->get()->first();
        $saldo      = auth()->user()->balance()->get()->first();
        
        return view('erp.balance.historico', compact('historicos','saldo','usuario'));
    }
    





}
