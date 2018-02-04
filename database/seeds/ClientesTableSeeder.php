<?php

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Cliente::create([
            'pessoa_id' => 4
            
        ]);        
        Cliente::create([
            'pessoa_id' => 5
            
        ]);        
        Cliente::create([
            'pessoa_id' => 6
            
        ]);         }
}
