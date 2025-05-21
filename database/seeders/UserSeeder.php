<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $developer = Role::where('slug','admin')->first();

        $createTasks = Permission::where('slug','manage-products')->first();

        $user1 = new User();
        $user1->last_name = 'Admin ';
        $user1->first_name = 'Admin ';
        $user1->middle_name = 'Admin ';
        $user1->email = 'admin@admin.com';
        $user1->password = bcrypt('secret');
        $user1->save();
        $user1->roles()->attach($developer);
        $user1->permissions()->attach($createTasks);

    }
}
