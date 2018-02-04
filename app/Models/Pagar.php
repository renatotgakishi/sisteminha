<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\MovFin;

class Pagar extends Model
{ 
            
    protected $fillable = ['fornecedor_id', 'nr_doc','descricao', 'valor', 'data_emissao', 'data_vencto','id_mov_fin'];


    public function pagamento($idportador, Pagar $pagar ) : Array
    {
    	
    
    }
    
    
}
