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
        \App\User::create([
        	'full_name' =>'Sujan Miya',
        	'phone_number' =>'01829215193',
        	'email' =>'su@gmail.com',
        	'password' =>bcrypt('123456'),
        ]);
    }
}
