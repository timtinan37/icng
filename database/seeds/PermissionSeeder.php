<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        Permission::create(['name' => 'view logs']);

        Permission::create(['name' => 'create branches']);
        Permission::create(['name' => 'view branches']);
        Permission::create(['name' => 'update branches']);
        Permission::create(['name' => 'delete branches']);
        
        Permission::create(['name' => 'create transits']);
        Permission::create(['name' => 'view transits']);
        Permission::create(['name' => 'update transits']);
        Permission::create(['name' => 'delete transits']);

        Permission::create(['name' => 'create carriages']);
        Permission::create(['name' => 'view carriages']);
        Permission::create(['name' => 'update carriages']);
        Permission::create(['name' => 'delete carriages']);

        Permission::create(['name' => 'create risks']);
        Permission::create(['name' => 'view risks']);
        Permission::create(['name' => 'update risks']);
        Permission::create(['name' => 'delete risks']);

        Permission::create(['name' => 'create cover notes']);
        Permission::create(['name' => 'view cover notes']);
        Permission::create(['name' => 'update cover notes']);
        Permission::create(['name' => 'delete cover notes']);
    }
}
