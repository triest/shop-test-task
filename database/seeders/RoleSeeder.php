<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $manager = new Role();
        $manager->name = 'Администратор';
        $manager->slug = 'admin';
        $manager->save();
        $developer = new Role();
        $developer->name = 'Заказчик';
        $developer->slug = ' customer';
        $developer->save();
    }
}
