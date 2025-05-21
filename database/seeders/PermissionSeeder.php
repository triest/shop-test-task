<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manageUser = new Permission();
        $manageUser->name = 'Manage products';
        $manageUser->slug = 'manage-products';
        $manageUser->save();
        $createTasks = new Permission();
        $createTasks->name = 'create orders';
        $createTasks->slug = 'create-orders';
        $createTasks->save();
    }
}
