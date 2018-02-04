<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\User;

class Balance extends Model
{
    //
    public function deposito(float $valor) : Array
    {
    	DB::BeginTransaction();

    	$totalBefore = $this->amount ? $this->amount : 0;
    	$this->amount += number_format($valor, 2, '.','');
    	$deposito = $this->save();

    	$historico= auth()->user()->historics()->create([
    	'type' => 'I',
    	'amount' => $valor,
    	'total_before' => $totalBefore,
    	'total_after' => $this->amount,    	
    	 'date' => date('Ymd'),
    	]);

    	if ($deposito && $historico) {

    		DB::commit();

    		return [
    			'success' => true,
    			'message' => 'deposito com sucesso'
    		];
    	} 
    	else
    	{
    		DB::rollback();

    		return [
    			'success' => falso,
    			'message' => 'deposito falhou!'
    		];
    	}
    	
	}

    public function saque(float $valor) : Array
    {
        if ($this->amount < $valor)
            return ['success' => false,
                    'message' => 'Saldo insuficiente ',
                    ];


        DB::BeginTransaction();

        $totalBefore = $this->amount ? $this->amount : 0;
        $this->amount -= number_format($valor, 2, '.','');
        $deposito = $this->save();

        $historico= auth()->user()->historics()->create([
        'type' => 'O',
        'amount' => $valor,
        'total_before' => $totalBefore,
        'total_after' => $this->amount,     
         'date' => date('Ymd'),
        ]);

        if ($deposito && $historico) {

            DB::commit();

            return [
                'success' => true,
                'message' => 'saque com sucesso'
            ];
        } 
        else
        {
            DB::rollback();

            return [
                'success' => falso,
                'message' => 'saque falhou!'
            ];
        }
        
    }

    public function transfere(float $valor, User $emailTransferencia ): Array
    {
        //dd($emailTransferencia->balance());

        if ($this->amount < $valor)
            return ['success' => false,
                    'message' => 'Saldo insuficiente ',
                    ];


        DB::BeginTransaction();
        // sai 
        $totalBefore = $this->amount ? $this->amount : 0;
        $this->amount -= number_format($valor, 2, '.','');
        $transfere = $this->save();

        $historico= auth()->user()->historics()->create([
        'type'                  => 'T',
        'amount'                => $valor,
        'total_before'          => $totalBefore,
        'total_after'           => $this->amount,     
         'date'                 => date('Ymd'),
         'user_id_transaction'  => $emailTransferencia->id

        ]);

        // entra 
        $emailTransfBalance = $emailTransferencia->balance()->firstOrCreate([]);

        $totalBeforeEmailTransferencia = $emailTransferencia->amount ? $emailTransferencia->amount : 0;
        $emailTransfBalance->amount += number_format($valor, 2, '.','');

        $salvaTransf = $emailTransfBalance->save();

        $historicoEmailTransferencia= $emailTransferencia->historics()->create([
        'type'                  => 'I',
        'amount'                => $valor,
        'total_before'          => $totalBeforeEmailTransferencia,
        'total_after'           => $emailTransfBalance->amount,     
         'date' => date('Ymd'),
         'user_id_transaction' => auth()->user()->id

        ]);

        if ($salvaTransf && $historicoEmailTransferencia) {

            DB::commit();

            return [
                'success' => true,
                'message' => 'saque com sucesso'
            ];
        } 
        else
        {
            DB::rollback();

            return [
                'success' => falso,
                'message' => 'saque falhou!'
            ];
        }
        

    }

    
}
