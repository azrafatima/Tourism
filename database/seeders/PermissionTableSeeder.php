<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit records']);
        Permission::create(['name' => 'delete records']);
        Permission::create(['name' => 'book tour']);
        Permission::create(['name' => 'view records']);
        

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'customer']);
        $role1->givePermissionTo('book tour');
        $role1->givePermissionTo('view records');
        

        // $role2 = Role::create(['name' => 'admin']);
        // $role2->givePermissionTo('edit records');
        // $role2->givePermissionTo('delete records');
        // $role2->givePermissionTo('create records');

        $role3 = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Customer',
            'email' => 'customer@cust.com',
            'password'=>bcrypt('employee'),
            
            'role'=>'customer',
        ]);
        $user->assignRole($role1);

        // $user = \App\Models\User::factory()->create([
        //     'name' => 'Example Admin User',
        //     'email' => 'admin@example.com',
        // ]);
        // $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'Super-Admin',
            'email' => 'superadmin@admin.com',
            'password'=> bcrypt('Adnan'),
            
            'role' => 'Admin',
        ]);
        $user->assignRole($role3);
    }
}
