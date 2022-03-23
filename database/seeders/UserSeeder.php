<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	//database/seeders/UserSeeder.php
	public function run()
	{
    	\DB::table('users')->insert([
        	'name' => 'catur',
        	'email' => 'catur@mail.com',
        	'password' => bcrypt('123'),
        	'created_at' => new \DateTime,
        	'updated_at' => null,
    		]);
	}	

}
