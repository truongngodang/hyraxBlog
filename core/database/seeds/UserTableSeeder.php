<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();

        $admin = new User();
        $admin->name = 'admin';
        $admin->birthday = '2016-06-27';
        $admin->email = 'admin@hyraxblog.com';
        $admin->password = Hash::make('00000000');
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
