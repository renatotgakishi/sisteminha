<?php

use Illuminate\Database\Seeder;
use App\Models\Fornecedor;
      
class FornecedorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Fornecedor::create([
            'pessoa_id' => 1
            
        ]);        
        Fornecedor::create([
            'pessoa_id' => 2
            
        ]);        
        Fornecedor::create([
            'pessoa_id' => 3
            
        ]);     
    }
}
