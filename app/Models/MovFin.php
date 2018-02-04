<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovFin extends Model
{
	protected $fillable = ['portador_id', 'historico', 'valor', 'dc'];

	
    public function portador()
    {
    	return $this->hasOne(Portador::class);
    }
}
