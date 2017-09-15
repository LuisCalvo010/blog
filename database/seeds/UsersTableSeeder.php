<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            
        [
            'name' => 'Juana',
            'email' => 'eve489@hotmail.com',
            'password' => bcrypt('123456')
        ],
        [
            'name' => 'Jorge Hernandez',
            'email' => 'jorge@hotmail.com',
            'password' => bcrypt('123456')
        ]
        ]);
    }
}
