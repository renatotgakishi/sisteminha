<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    //

    public function fornecedor(){
    	return $this->hasOne(Fornecedor::class);
    }
}
