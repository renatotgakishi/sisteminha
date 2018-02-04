<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Renato',
            'email' => 'renatotgakishi@gmail.com',
            'password' => bcrypt('123') 
        ]);    

        User::create([
            'name' => 'outra pessoa',
            'email' => 'outro@gmail.com',
            'password' => bcrypt('123') 
        ]);    
    }

}

    

