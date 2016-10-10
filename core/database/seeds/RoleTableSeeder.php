<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = new Role();
        $role_user->name = 'User';
        $role_user->desc = 'Người dùng bình thường';
        $role_user->save();

        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->desc = 'Quản trị viên';
        $role_admin->save();
    }
}
