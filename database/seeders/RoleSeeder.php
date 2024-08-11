<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //  
        $permission = new Permission();
        $permission->name = 'create-post';
        $permission->save();

        $role = new Role();
        $role->name = 'admin';
        $role->save();

        $role->permissions()->attach($permission);
        // $permission->roles()->attach($role);

        $permission = new Permission();
        $permission->name = 'create-user';
        $permission->save();

        $role = new Role();
        $role->name = 'user';
        $role->save();

        $role->permissions()->attach($permission);
        // $permission->roles()->attach($role);

        $admin = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();
        $create_post = Permission::where('name', 'create-post')->first();
        $create_user = Permission::where('name', 'create-user')->first();

        $admin = new User();
        $admin->fullname = 'Zaw Zaw';
        // $admin->username = 'zawzaw';
        $admin->subdomain = 'zawzaw';
        $admin->email = 'admin@gmail.com';
        $admin->password = bcrypt('admin');
        $admin->save();
        $admin->roles()->attach($admin);
        $admin->permissions()->attach($create_post);

        $user = new User();
        $user->fullname = 'Kyaw Kyaw';
        // $user->username = 'kyawkyaw';
        $user->subdomain = 'kyawkyaw';
        $user->email = 'user@gmail.com';
        $user->password = bcrypt('user');
        $user->save();

        $user->roles()->attach($userRole);
        $user->permissions()->attach($create_user);
    }
}
