<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'ken']);
        Permission::create(['name' => 'nassor']);
        Permission::create(['name' => 'juma']);
        Permission::create(['name' => 'luis']);
        Permission::create(['name' => 'dos']);
    }
}
