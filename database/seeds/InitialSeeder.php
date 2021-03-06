<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class InitialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('users')->insert([
		    'name' => 'Godwin Elitcha',
		    'email' => 'admin@mail.com',
		    'password' => bcrypt('123456'),
		    'created_at' => Carbon::now(),
		    'updated_at' => Carbon::now(),
	    ]);
    }
}
