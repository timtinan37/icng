<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class RiskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('risks')->insert([
        	[
	        	'id' => Str::uuid(),
	        	'name' => 'Theft',
	        	'tariff' => 0.20,
	        	'created_at' => now(),
	        	'updated_at' => now(),
	        ],
	        [
	        	'id' => Str::uuid(),
	        	'name' => 'Natural Calamities',
	        	'tariff' => 0.15,
	        	'created_at' => now(),
	        	'updated_at' => now(),
	        ]
        ]);
    }
}
