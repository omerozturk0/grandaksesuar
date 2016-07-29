<?php

use Illuminate\Database\Seeder;

class ModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\Module::truncate();

        \App\Module::create([
            'name' => 'Sayfalar',
            'is_active' => 1,
        ]);

        \App\Module::create([
            'name' => 'Ürünler',
            'is_active' => 1,
        ]);

        // Create role
        $owner = new \App\Role();
        $owner->name = 'owner';
        $owner->display_name = 'Yazılım Sahibi';
        $owner->save();

        // Create user
        $user = new \App\User();
        $user->name = 'Ömer Öztürk';
        $user->email = 'omer.oztrk0@gmail.com';
        $user->password = bcrypt(123456);
        $user->is_active = 1;
        $user->save();

        // Attach role to user
        $role = \App\Role::where('name', 'owner')->first();
        $user->attachRole($role);

        // Create permission
        $perm = new \App\Permission();
        $perm->name = 'login-admin-panel';
        $perm->display_name = 'Yönetim Paneli Giriş';
        $perm->save();

        // Attach permission to role
        $role = \App\Role::where('name', 'owner')->first();
        $role->attachPermission($perm);
    }
}
