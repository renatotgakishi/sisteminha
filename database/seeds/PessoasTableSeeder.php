<?php

use Illuminate\Database\Seeder;
use App\Models\Pessoa;

class PessoasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pessoa::create([
            'nome' => 'Fornecedor A',
            
        ]);        
        Pessoa::create([
            'nome' => 'Fornecedor B',
            
        ]);        
        Pessoa::create([
            'nome' => 'Fornecedor C',
            
        ]);     
        Pessoa::create([
            'nome' => 'Cliente A',
            
        ]);        
        Pessoa::create([
            'nome' => 'Cliente B',
            
        ]);        
        Pessoa::create([
            'nome' => 'Cliente C',
            
        ]);        

    }
}
