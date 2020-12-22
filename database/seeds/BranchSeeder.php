<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();

        DB::table('branches')->insert([
        	[
	        	'id' => Str::uuid(),
	            'name' => 'Head Office',
	            'address' => $faker->address,
	            'phone_number' => $faker->phoneNumber,
	            'fax_number' => $faker->phoneNumber,
	            'email' => $faker->email,
	            'created_at' => now(),
	            'updated_at' => now(),
        	],
        	[
	        	'id' => Str::uuid(),
	            'name' => 'Motijheel Branch',
	            'address' => $faker->address,
	            'phone_number' => $faker->phoneNumber,
	            'fax_number' => $faker->phoneNumber,
	            'email' => $faker->email,
	            'created_at' => now(),
	            'updated_at' => now(),
        	],
        	[
	        	'id' => Str::uuid(),
	            'name' => 'Karwan Bazar Branch',
	            'address' => $faker->address,
	            'phone_number' => $faker->phoneNumber,
	            'fax_number' => $faker->phoneNumber,
	            'email' => $faker->email,
	            'created_at' => now(),
	            'updated_at' => now(),
        	]
        ]);
    }
}
