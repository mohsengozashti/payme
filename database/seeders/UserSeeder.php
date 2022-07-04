<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
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
        $faker = Factory::create();
        $roles = ['user','manager','merchant','finance','payout'];

        User::factory()->count('50')->make()->each(function (User $user) use ($roles) {
            $user->assignRole($roles[array_rand($roles)]);
            $user->save();
        });
    }
}
