<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portador extends Model
{
    //

    protected $fillable = [
        'nome',
    ];

    public function MovFins(){
        return $this->HasMany(MovFins::class);
    }
}
