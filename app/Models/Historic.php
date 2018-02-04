<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Historic extends Model
{
    //
    protected $fillable = ['type', 'amount', 'total_before', 'total_after', 'user_id_transaction', 'date'];

    public function getDateAttribute($value ){
    	return Carbon::parse($value)->format('d/m/Y');
    }

    public function type($type =  null){
    	$types =[
    		'I'  =>   "Entrada",
    		'O'  =>   "Saida",
    		'T'  =>   "Transferencia",
    	];
    	if (!$type)
    		return $types;
        if ($this->user_id_transaction != null && $type = 'I')
            Return 'Recebido';

    	return $types[$type];
    }
}
