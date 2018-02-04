<?php

use Illuminate\Database\Seeder;
use App\Models\Portador;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Portador::create([
            'nome' => 'Caixa fundo fixo'
            
        ]);        
        Portador::create([
            'nome' => 'Banco Itau agencia Santana'
            
        ]);        
        Portador::create([
            'nome' => 'Banco Bradesco agencia Paulista''
            
        ]);         }
}
