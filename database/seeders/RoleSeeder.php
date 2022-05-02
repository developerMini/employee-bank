<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = array(
            array('title'=>'Super Admin'),
            array('title'=>'Admin'),
            array('title'=>'User'),
        );
        Role::insert($roles);
    }
}
