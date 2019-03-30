<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([
        	'name' => 'Administrator',
        	'email' => 'adminbtron@gmail.com',
        	'email_verified_at' => '2019-03-24 15:54:07',
        	'password' => Hash::make('password'),
        	'gender' => 'male',
        	'foto' => 'icon.jpg',
        	'id_province' => '35',
        	'id_city' => '3507',
        	'address' => 'Jl.Ngamarto Lawang',
        	'telp' => '080000000',
        	'status' => 'admin'
        ]);
    }
}
