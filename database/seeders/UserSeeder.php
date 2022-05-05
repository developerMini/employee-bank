<?php

namespace Database\Seeders;

use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Super Admin';
        $user->email = 'super-admin@admin.com';
        $user->emp_id = 'SAU001';
        $user->password = Hash::make('12345');;
        $user->save();

        $role_user = new RoleUser();
        $role_user->user_id=$user->id;
        $role_user->role_id=1;
        $role_user->save();
    }
}
