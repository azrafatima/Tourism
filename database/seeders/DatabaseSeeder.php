<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $admin_role = Role::create(['name' => 'admin']);
        $admin = User::create([
            'name' => 'Adnan',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'role'=> 'admin',
        ]);
        $admin->assignRole($admin_role);

        $user_role = Role::create(['name' => 'user']);
        $user = User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('user'),
            'role'=>'user',
        ]);
        $user->assignRole($user_role);

        // $this->call(AdminSeeder::class);
        
        // $permission = Permission::create(['name' => 'edit articles']);
        
    }
}
