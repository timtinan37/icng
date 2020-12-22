<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TransitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transits')->insert([
        	[
	        	'id' => Str::uuid(),
	        	'name' => 'Steamer',
	        	'created_at' => now(),
	        	'updated_at' => now()
	        ],
	        [
	        	'id' => Str::uuid(),
	        	'name' => 'Truck',
	        	'created_at' => now(),
	        	'updated_at' => now()
	        ],
	        [
	        	'id' => Str::uuid(),
	        	'name' => 'Bus',
	        	'created_at' => now(),
	        	'updated_at' => now()
	        ],
        ]);
    }
}
