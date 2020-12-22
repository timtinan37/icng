<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CarriageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carriages')->insert([
        	[
	        	'id' => Str::uuid(),
	            'name' => 'Bus',
	            'created_at' => now(),
	            'updated_at' => now(),
        	],
        	[
	        	'id' => Str::uuid(),
	            'name' => 'Truck',
	            'created_at' => now(),
	            'updated_at' => now(),
        	],
        	[
	        	'id' => Str::uuid(),
	            'name' => 'Steamer',
	            'created_at' => now(),
	            'updated_at' => now(),
        	]
        ]);
    }
}
