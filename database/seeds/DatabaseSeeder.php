<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PessoasTableSeeder::class);
        $this->call(FornecedorsTableSeeder::class);                    
        $this->call(ClientesTableSeeder::class);
        $this->call(PagarsTableSeeder::class);
        $this->call(Portador::class);
                    
    }
}
