<?php

use Illuminate\Database\Seeder;
use App\Models\Pagar;

class PagarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 		Pagar::create([
            'fornecedor_id' => 1,
            'nr_doc' 		=> '123',
            'descricao'   	=> 'conta de ',
            'data_emissao'	=>  '2017-01-01',
            'data_vencto'	=> '2017-01-01',
            'valor'			=> 10,
            
        ]);        
 		Pagar::create([
            'fornecedor_id' => 2,
            'nr_doc' 		=> '123',
            'descricao'   	=> 'conta de ',
            'data_emissao'	=>  '2017-01-01',
            'data_vencto'	=> '2017-01-01',
            'valor'			=> 20,
            
        ]);        

 		Pagar::create([
            'fornecedor_id' => 3,
            'nr_doc' 		=> '123',
            'descricao'   	=> 'conta de ',
            'data_emissao'	=>  '2017-01-01',
            'data_vencto'	=> '2017-01-01',
            'valor'			=> 30,
            
        ]);        
   	}
}
