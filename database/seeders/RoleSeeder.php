<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $userRole = \Spatie\Permission\Models\Role::create(['name' => 'user']);
      $merchantRole = \Spatie\Permission\Models\Role::create(['name' => 'merchant']);
      $merchantRole = \Spatie\Permission\Models\Role::create(['name' => 'manager']);
      $merchantRole = \Spatie\Permission\Models\Role::create(['name' => 'finance']);
      $merchantRole = \Spatie\Permission\Models\Role::create(['name' => 'payout']);
    }
}
