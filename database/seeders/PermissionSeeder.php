<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $data = $this->data();
        foreach ($data as $value) {
            Permission::create([
                'name' => $value['name'],
                'description' => $value['description'],
            ]);
        }
    }

    public function data()
    {
        return [
            // User permissions
            [
            'name' => 'view-user',
            'description' => 'View User Information'],
            [
                'name' => 'create-user',
                'description' => 'Create User'
            ],
            [
                'name' => 'update-user',
                'description' => 'Update User'
            ],
            [
                'name' => 'delete-user',
                'description' => 'Delete User'
            ],
            // merchant permissions
            [
                'name' => 'view-merchant',
                'description' => 'View Merchant Information'],
            [
                'name' => 'create-merchant',
                'description' => 'Create Merchant'
            ],
            [
                'name' => 'update-merchant',
                'description' => 'Update Merchant'
            ],
            [
                'name' => 'delete-merchant',
                'description' => 'Delete Merchant'
            ],
            // role permissions
            [
                'name' => 'create-role',
                'description' => 'Create Merchant'
            ],
            [
                'name' => 'update-role',
                'description' => 'Update Merchant'
            ],
            [
                'name' => 'delete-role',
                'description' => 'Delete Merchant'
            ],
            //FundIn Permissions
            [
                'name' => 'view-fund-in',
                'description' => 'View FundIn Transaction'],
            [
                'name' => 'create-fund-in',
                'description' => 'Manual Create FundIn'
            ],
            [
                'name' => 'update-fund-in',
                'description' => 'Update FundIn Transaction'
            ],
            [
                'name' => 'delete-fund-in',
                'description' => 'Delete FundIn Transaction'
            ],
            [
                'name' => 'create-fund-in-link',
                'description' => 'Generate FundIn Payment Link'
            ],
            //Settlement Permissions
            [
                'name' => 'view-settlement',
                'description' => 'View Settlement Transaction'],
            [
                'name' => 'create-settlement',
                'description' => 'Manual Create Settlement'
            ],
            [
                'name' => 'update-settlement',
                'description' => 'Update Settlement Transaction'
            ],
            [
                'name' => 'delete-settlement',
                'description' => 'Delete Settlement Transaction'
            ],
            //FundOut Permissions
            [
                'name' => 'view-fund-out',
                'description' => 'View FundOut Transaction'],
            [
                'name' => 'create-fund-out',
                'description' => 'Manual Create FundOut'
            ],
            [
                'name' => 'update-fund-out',
                'description' => 'Update FundOut Transaction'
            ],
            [
                'name' => 'delete-fund-out',
                'description' => 'Delete FundOut Transaction'
            ],
        ];

    }
}
