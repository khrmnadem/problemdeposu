<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_ogretmen = new Role();
        $role_ogretmen->name = 'ogretmen';
        $role_ogretmen->description = 'Öğretmen Kullanıcı';
        $role_ogretmen->save();

        $role_yonetici = new Role();
        $role_yonetici->name = 'yonetici';
        $role_yonetici->description = 'Yönetici Kullanıcı';
        $role_yonetici->save();

        $role_hakem = new Role();
        $role_hakem->name = 'hakem';
        $role_hakem->description = 'Hakem Kullanıcı';
        $role_hakem->save();
  }
}
