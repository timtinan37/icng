<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'id' => Str::uuid(),
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);
        
        $admin->givePermissionTo(Permission::all());
    }
}
