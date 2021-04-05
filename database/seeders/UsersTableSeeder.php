<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new \App\Models\User;
        $admin->name = 'admin';
        $admin->email = 'admin@gmail.com';
        $admin->password = bcrypt('admin');
        $admin->isAdmin = true;
        $admin->save();

        $user = new \App\Models\User;
        $user->name = 'user';
        $user->email = 'user@gmail.com';
        $user->password = bcrypt('user');
        $user->isAdmin = true;
        $user->save();
    }
}
