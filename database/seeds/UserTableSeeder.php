<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_yonetici  = Role::where('name', 'yonetici')->first();

        $yonetici = new User();
        $yonetici->name = 'Admin Yönetici';
        $yonetici->email = 'yonetici@ornek.com';
        $yonetici->password = bcrypt('admin123');
        $yonetici->save();
        $yonetici->roles()->attach($role_yonetici);
    }
}
