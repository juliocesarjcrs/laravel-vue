<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'rol' => 1,
            'email' =>'admin@correo.com',
            'password' => Hash::make('123456'),
        ],
        [
            'name' => 'vendedor',
            'rol' => 2,
            'email' =>'vendedor@correo.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
